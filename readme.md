# Admin 5.3

A site to allow the management of users and roles

## Contents

- [Forms](#forms)

## Forms

Forms opened with Laravel Collective require certain additional attributes set to allow SweetAlert to work correctly.

```php
{!! Form::open(['id' => 'form', 'route' => 'api.profile.password', 'redirect' => route('profile.index'), '_method' => 'PATCH', 'class' => 'col-md-12']) !!}
```

* id - always needs to be set to form
* redirect - this is the location that the browser will redirect to after closing the SweetAlert
* _method - the method required to submit the form *(POST,PATCH)*