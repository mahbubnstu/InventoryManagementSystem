<?php



Route::get('/', function () {
    return Redirect()->route('login');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');


// POS ROUTES ARE HERE......
Route::get('/pos','PosController@index')->name('pos');
Route::get('/pending.order','PosController@PendingOrder')->name('pending.order');
Route::get('/view-order-status/{id}','PosController@ViewOrder');
Route::get('/pos-done/{id}','PosController@PosDone');
Route::get('/success.order','PosController@SuccessOrder')->name('success.order');



//employee routes are here
Route::get('/add-employee','EmployeeController@index')->name('add.employee');
Route::post('/insert-employee','EmployeeController@Store')->name('insert-employee');
Route::get('/all.employe','EmployeeController@AllEmployees')->name('all.employee');
Route::get('/delete-employee/{id}','EmployeeController@DeleteEmployee');
Route::get('/view-employee/{id}','EmployeeController@ViewEmployee');
Route::get('/edit-employee/{id}','EmployeeController@EditEmployee');
Route::post('/update-employee/{id}','EmployeeController@UpdateEmployee');

//Customers route are here
Route::get('/add-customer','CustomerController@index')->name('add.customer');
Route::post('/insert-customer','CustomerController@Store');
Route::get('/all-customer','CustomerController@AllCustomer')->name('all.customer');
Route::get('/delete-customer/{id}','CustomerController@DeleteCustomer');
Route::get('/view-customer/{id}','CustomerController@ViewCustomer');
Route::get('/edit-customer/{id}','CustomerController@EditCustomer');
Route::post('/update-customer/{id}','CustomerController@UpdateCustomer');

//Suppliers route are here
Route::get('/add-supplier','SupplierController@index')->name('add.supplier');
Route::post('/insert-supplier','SupplierController@Store');
Route::get('/all-supplier','SupplierController@AllSupplier')->name('all.supplier');
Route::get('/delete-supplier/{id}','SupplierController@DeleteSupplier');
Route::get('/view-supplier/{id}','SupplierController@ViewSupplier');
Route::get('/edit-supplier/{id}','SupplierController@EditSupplier');
Route::post('/update-supplier/{id}','SupplierController@UpdateSupplier');

//Employees salary route are here
Route::get('/add-advanced-salary','SalaryController@AddAdvancedSalary')->name('add.advancedsalary');
Route::post('/insert-advancedsalary','SalaryController@InsertAdvanced')->name('insert-advancedsalary');
Route::get('/all-advancedsalary','SalaryController@AllSalary')->name('all.advancedsalary');
Route::get('/pay-salary','SalaryController@PaySalary')->name('pay.salary');

//Category routes are here
Route::get('/add-category','CategoryController@AddCategory')->name('add.category');
Route::post('/insert-category','CategoryController@InsertCategory')->name('insert-category');
Route::get('/all-category','CategoryController@AllCategory')->name('all.category');
Route::get('/delete-category/{id}','CategoryController@DeleteCategory');
Route::get('/edit-category/{id}','CategoryController@EditCategory');
Route::post('/update-category/{id}','CategoryController@UpdateCategory');

//Product routes are here...
Route::get('/add-product','ProductController@AddProduct')->name('add.product');
Route::post('/insert-product','ProductController@InsertProduct')->name('insert-product');
Route::get('/all-product','ProductController@AllProduct')->name('all.product');
Route::get('/delete-product/{id}','ProductController@DeleteProduct');
Route::get('/view-product/{id}','ProductController@ViewProduct');
Route::get('/edit-product/{id}','ProductController@EditProduct');
Route::post('/update-product/{id}','ProductController@UpdateProduct');

///IMPORT AND EXPORT PRODUCTS ROUTE ARE HERE...
Route::get('/import-product','ProductController@ImportProduct')->name('import.product');
Route::get('/export','ProductController@export')->name('export');
Route::post('/import','ProductController@import')->name('import');

//Expenses routes are here...
Route::get('/add-expense','ExpenseController@AddExpense')->name('add.expense');
Route::post('/insert-expense','ExpenseController@InsertExpense')->name('insert-expense');
Route::get('/today-expense','ExpenseController@TodayExpense')->name('today.expense');
Route::get('/edit-expense/{id}','ExpenseController@EditExpense');
Route::post('/update-expense/{id}','ExpenseController@UpdateExpense');
Route::get('/monthly-expense','ExpenseController@MonthlyExpense')->name('monthly.expense');
Route::get('/yearly-expense','ExpenseController@YearlyExpense')->name('yearly.expense');

//Monthly more expenses routes are here.....
Route::get('/january-expense','ExpenseController@JanuaryExpense')->name('january.expense');
Route::get('/february-expense','ExpenseController@FebruaryExpense')->name('february.expense');
Route::get('/march-expense','ExpenseController@MarchExpense')->name('march.expense');
Route::get('/april-expense','ExpenseController@AprilExpense')->name('april.expense');
Route::get('/may-expense','ExpenseController@MayExpense')->name('may.expense');
Route::get('/june-expense','ExpenseController@JuneExpense')->name('june.expense');
Route::get('/july-expense','ExpenseController@JulyExpense')->name('july.expense');
Route::get('/august-expense','ExpenseController@AugustExpense')->name('august.expense');
Route::get('/september-expense','ExpenseController@SeptemberExpense')->name('september.expense');
Route::get('/october-expense','ExpenseController@OctoberExpense')->name('october.expense');
Route::get('/november-expense','ExpenseController@NovemberExpense')->name('november.expense');
Route::get('/december-expense','ExpenseController@DecemberExpense')->name('december.expense');

//ATTENDENCE ROUTES ARE HERE.....
Route::get('/take-attendence','AttendenceController@TakeAttendence')->name('take.attendence');
Route::post('/insert-attendence','AttendenceController@InsertAttendence')->name('insert-attendence');
Route::get('/all-attendence','AttendenceController@AllAttendence')->name('all.attendence');
Route::get('/edit-attendence/{att_date}','AttendenceController@EditAttendence');
Route::post('/update-attendence','AttendenceController@UpdateAttendence');
Route::get('/view-attendence/{att_date}','AttendenceController@ViewAttendence');



//SETTINGS ROUTES ARE HERE.....
Route::get('/website-setting','SettingController@Setting')->name('setting');
Route::post('/update-setting/{id}','SettingController@UpdateSetting');

// PRODUCTS CART ROUTES ARE HERE......
Route::post('/add-cart','CartController@index');
Route::post('/cart-update/{rowId}','CartController@CartUpdate');
Route::get('/cart-remove/{rowId}','CartController@CartRemove');
Route::post('/invoice','CartController@Invoice');
Route::post('/final-invoice','CartController@FinalInvoice');