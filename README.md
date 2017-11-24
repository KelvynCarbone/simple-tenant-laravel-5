# Simple Tenant Laravel 5
A simple tenant in laravel 5 using observer, when you create any register this technique will check if tenant_id exist and will fill.

## Step 1
If you started a project, you may don't have a Traits directory, create then. After create, now you create your TenantTrait.php (look the example files).

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
If you started a project, you may don't have a Observers directory, create then. Create and configure your TenantObserver.php (look the example files).

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
        if(isset($model->tenant_id))
            $model->tenant_id = Session::get('tenant_id');
    }
}
```

## Step 3
#### IMPORTANT: You do not want to use TenantTrait on all models by BaseModel, so you can call it model by model.

Every model needed extends a BaseModel.php, in this BaseModel you put use App\Traits\TenantTrait; and use TenantTrait; (look the example files).

### BaseModel Trait Implement

```php
namespace App\Entities;
use App\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    use TenantTrait;
}
```

### Example model extends
```php
namespace App\Entities;
use App\Entities\BaseModel;
class YourModel Extends BaseModel {

}
```

Enjoy!
