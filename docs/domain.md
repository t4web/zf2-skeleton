# ZF2 Skeleton. Domain

In this tutorial we describe entity `Show` - for managing TV Shows catalog. `Show` caontain name, description and picture.

#### Describe entity

For Domain layer we must describe `entity_map` in your `module.config.php`:

```php
'entity_map' => [
    'Show' => [
        'entityClass' => Domain\Show\Show::class,
        'table' => 'shows',
        'primaryKey' => 'id',
        'columnsAsAttributesMap' => [
            'id' => 'id',
            'name' => 'name',
            'description' => 'description',
            'picture' => 'picture',
            'created_dt' => 'createdDt',
            'updated_dt' => 'updatedDt',
        ],
        'criteriaMap' => [
            'id' => 'id_equalTo',
        ]
    ],
]
```

Somewhere in `module/Shows/src/Domain/Show/Show.php`:
```php
<?php

namespace Shows\Domain\Show;

use T4webDomain\Entity;

class Show extends Entity
{
    const FILE_STORAGE_DIR_PATH = './public/data/shows';
    const FILE_MEDIA_DIR_PATH = '/data/shows';

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $picture;

    /**
     * @var string
     */
    protected $createdDt;

    /**
     * @var string
     */
    protected $updatedDt;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    public function populate(array $array = [])
    {
        if ($this->id === null && empty($array['id'])) {
            if (empty($array['createdDt'])) {
                $array['createdDt'] = date('Y-m-d H:i:s');
            }
            if (isset($array['updatedDt'])) {
                unset($array['updatedDt']);
            }

        } elseif ($this->id !== null) {
            $array['updatedDt'] = date('Y-m-d H:i:s');
        }

        parent::populate($array);
    }

    /**
     * @return void
     */
    public function generateNewPictureName($extension)
    {
        $this->picture = md5(time()) . '.' . $extension;
    }

    /**
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @return string
     */
    public function getFileMediaPath()
    {
        return self::FILE_MEDIA_DIR_PATH . DIRECTORY_SEPARATOR . $this->picture;
    }

    /**
     * @return string
     */
    public function getFileStoragePath()
    {
        return self::FILE_STORAGE_DIR_PATH . DIRECTORY_SEPARATOR . $this->picture;
    }
}
```
