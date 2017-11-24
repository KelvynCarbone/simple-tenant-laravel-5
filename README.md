# Simple Tenant Laravel 5
A simple tenant in laravel 5 using observer, when you create any register this technique will check if tenant_id exist and will fill.

## Step 1
If you started a project, you may don't have a directory Traits, create then. After create, now you create your TenantTrait.php (look the example files).

```php
namespace App\Traits;

use App\Observers\TenantObserver;

trait TenantTrait
{
    public static function bootTenantTrait()
    {
        static::observe(TenantObserver::class);
    }
}
```

## Step 2
If you started a project, you may don't have a directory Observers, create then. Create and configure your TenantObserver.php (look the example files).

```php
namespace App\Observers;

use App\Entities\BaseModel;
use Illuminate\Support\Facades\Session;

class TenantObserver
{
    /**
     * Listen to the User created event.
     *
     * @param  \User  $user
     * @return void
     */
    public function creating(BaseModel $model)
    {
        $model->product_id = Session::get('product_id');
    }
}
```

## Step 3
IMPORTANT: If you didn't use the TenantTrait on all models you can use separate, model by model.

Every model needed extends a BaseModel.php, in this BaseModel you put use App\Traits\TenantTrait; and use TenantTrait; (look the example files).

```php
use App\Entities\BaseModel;

class YourModel Extends BaseModel {
}
```

Enjoy!
