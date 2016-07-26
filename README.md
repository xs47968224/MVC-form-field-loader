# MVC-form-field-loader
MVC form field loader,field repeater,auto form field code, codeigniter auto form field, MVC form field template，you need create an array for form field in controller 

Usage: 
==============

### Codeigniter Example 
### Controller:
```php
////A simple sample data
 $this->data['module_url']  = 'admin/user/';
 $this->data['upload_path'] = 'public/upload/user/';
 $this->data['edit_fields'] = array(
            'user_name' => array('type' => 'text', 'label' => 'Username', 'extra' => array('wrapper' => 'col-sm-6')),
            'password'  => array('type' => 'password', 'label' => 'Password','notes'=>'Required if adding new user', 'extra' => array('wrapper' => 'col-sm-6')),
            'email'     => array('type' => 'text', 'label' => 'Email'),
            'avatar'    => array('type' => 'file', 'label' => 'avatar'),
            'real_name' => array('type' => 'text', 'label' => 'Real Name'),
            'sex'       => array('type' => 'radio', 'label' => 'Sex','default'=>array('1'=>'Male','2'=>'Female')),
            'birthday'  => array('type' => 'text', 'label' => 'Birthday','class'=>'datepicker','extra'=>array('data'=>array('format'=>'YYYY-MM-DD'))),
		        'role'=> array('type' => 'select', 'label' => 'Role', 'default' => array('1' => 'Admin', '2' => 'Editor', '3' => 'User', '4' => 'Subscriber')),
            'status'    => array('type' => 'checkbox', 'label' => 'Status', 'default' => array('1' => 'Active','2' => 'Inactive')),
		);
		
	//// !important : $item is the default value for form fields 
  if (isset($id) && is_numeric($id)) {
      $this->data['item'] = $this->model->as_array()->get($id);
  } else {
      $this->data['item'] = isset($_POST) ? $_POST : "";
  }
 $this->load->view($this->data['module_url'] . "item", $this->data);
```

----------

###  View:
```php
<form role="form" enctype="multipart/form-data" action="" method="post">

    <?php $this->load->view("custom-fields",$edit_fields);?>

    <button class="btn btn-lg btn-primary" type="submit"><i class="glyphicon glyphicon-ok"></i>&nbsp;Submit</button>
</form>
```

Add extra field in array: 'extra' => array('wrapper' => 'col-sm-6');
You can edit custom field for you project

if you have any ideas ,mail to: 858785716@qq.com 
