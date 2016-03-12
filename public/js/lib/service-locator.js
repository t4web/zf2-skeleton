var ServiceLocator = {};
ServiceLocator.ServiceNotFoundException = function() {};

define(
    'ServiceLocator',
    ["underscore"],
    function () {
        'use strict';

        /**
         * @param object config
         * var config =
         * {
         *      "Status/Factory": function(sl){
         *          var dfd = $.Deferred();
         *          require(["Status/Factory"], function(StatusFactory){
         *              dfd.resolve(new StatusFactory());
         *          });
         *          return dfd.promise();
         *      },
         *
         *      TasksCollection: function(sl){
         *          var dfd = $.Deferred();
         *          require(["TasksCollection"], function(TasksCollection){
         *              sl.resolve(["Status/Factory"], function(statusFactory){
         *                  dfd.resolve(new TasksCollection([], {statusFactory: statusFactory}));
         *              });
         *          });
         *          return dfd.promise();
         *      },
         * }
         * @throws ServiceLocator.ServiceNotFoundException
         */
        return function(config) {
            var instances = {};

            if (typeof config == 'undefined') {
                throw Error('Service locator: config must be specified');
            }

            this.resolve = function(deps, callback, context){
                if (typeof callback !== 'function') {
                    throw new Error('Service locator: callback must be specified');
                }

                _.each(deps, function(value){

                    if (!config.hasOwnProperty(value)) {
                        throw new ServiceLocator.ServiceNotFoundException('Service locator was unable to fetch or create an instance for ' + value);
                    }

                    if (instances.hasOwnProperty(value)) {
                        return;
                    }

                    var constructor = config[value];

                    var promise = constructor(this);

                    instances[value] = promise;

                    $.when(promise).then(function(instance){
                        instances[value] = instance;
                    });

                }, this);

                callbackApply(deps, callback, context);
            };

            var callbackApply = function(deps, callback, context) {
                var callbackArguments = [];
                var promises = [];

                _.each(deps, function(value){
                    if (isPromise(instances[value])) {
                        promises.push(instances[value]);
                        return;
                    }

                    callbackArguments.push(instances[value]);
                });

                if (promises.length > 0) {
                    $.when.apply($, promises).then(function() {
                        callbackApply(deps, callback, context);
                    });
                    return;
                }

                callback.apply(context, callbackArguments);
            };

            var isPromise = function(value) {
                return (typeof value.then == 'function');
            };
        };
    }
);

ServiceLocator.ServiceNotFoundException = function () {
    var tmp = Error.apply(this, arguments);
    tmp.name = this.name = 'ServiceNotFoundException';

    this.message = tmp.message;
    Object.defineProperty(this, 'stack', { // getter for more optimizy goodness
        get: function() {
            return tmp.stack
        }
    });

    return this;
};
var IntermediateInheritor = function() {};
IntermediateInheritor.prototype = Error.prototype;
ServiceLocator.ServiceNotFoundException.prototype = new IntermediateInheritor();