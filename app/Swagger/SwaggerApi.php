<?php

/**  Register User
     * @SWG\Post(
     *  path="/api/v1/auth/resetpassword",
     *  tags={"Auth"},
     *  summary="Reset Forgot Password.",
     *  description="send password with confirmation to reset password.",
     *  produces={"application/json"},     
     *  @SWG\Parameter(
     *      name="accountno",
     *      in="formData",
     *      required=true, 
     *      type="string",
     *      default="104424"
     *  ),
     *  @SWG\Parameter(
     *      name="username",
     *      in="formData",
     *      required=true, 
     *      type="string",
     *      default="demoowner"
     *  ),
     * @SWG\Parameter(
     *      name="password",
     *      in="formData",
     *      required=true, 
     *      type="string",
     *      default="123456"
     *  ),
     * @SWG\Parameter(
     *      name="password_confirmation",
     *      in="formData",
     *      required=true, 
     *      type="string",
     *      default="123456"
     *  ),
     *  @SWG\Response(
     *      response=200,
     *      description="Success true",
     *      @SWG\Schema(ref="#/definitions/PasswordUpdated")
     *  ),
     *  @SWG\Response(
     *      response=401,
     *      description="Unauthorized action",
     *      @SWG\Schema(ref="#/definitions/EmailNotExist")
     *  )
     * )
     **/

/**  Save Cash drawer
     * @SWG\Post(
     *  path="/api/v1/companies/{company_id}/cashdrawer",
     *  tags={"CASH DRAWER"},
     *  summary="Save Cash drawer.",
     *  description="Denomination object to save cash drawer.",
     *  produces={"application/json"},
     * @SWG\Parameter(
     *      name="Authorization",
     *      in="header",
     *      required=true, 
     *      type="string"
     *  ),
     * @SWG\Parameter(
     *      name="company_id",
     *      in="path",
     *      required=true, 
     *      type="integer",
     *  ),
     *  @SWG\Parameter(
     *      name="data",
     *      in="body",
     *      required=true,
     *      @SWG\Schema(ref="#/definitions/SaveCashDrawerParam"),
     *  ),
     *  @SWG\Response(
     *      response=200,
     *      description="Success",
     *      @SWG\Schema(ref="#/definitions/SaveCashDrawerResponseMatch")
     *  ),
     *  @SWG\Response(
     *      response=401,
     *      description="Unauthorized action.",
     *      @SWG\Schema(ref="#/definitions/SaveCashDrawerErrorNotMatch")
     *  )
     * )
     **/

/**  Get Items
     * @SWG\Get(
     *  path="/api/v1/companies/{company_id}/store/items",
     *  tags={"Item Lookup"},
     *  summary="Get Item list related to store.",
     *  description="get all item which available in store.",
     *  produces={"application/json"},
     *  @SWG\Parameter(
     *      name="Authorization",
     *      in="header",
     *      required=true, 
     *      type="string"
     *  ),
     * @SWG\Parameter(
     *      name="company_id",
     *      in="path",
     *      required=true, 
     *      type="integer",
     *      default="1"
     *  ),    
     *  @SWG\Response(
     *      response=200,
     *      description="Success , Items object",
     *      @SWG\Schema()
     *  ),
     *  @SWG\Response(
     *      response=401,
     *      description="Unauthorized action.",
     *      @SWG\Schema()
     *  )
     * )
    **/

/**  Get searched Items
     * @SWG\Post(
     *  path="/api/v1/companies/{company_id}/store/items/search",
     *  tags={"Item Lookup"},
     *  summary="Get searched Items related to store.",
     *  description="get searched item list according to keyword which available in store.",
     *  produces={"application/json"},
     *  @SWG\Parameter(
     *      name="Authorization",
     *      in="header",
     *      required=true, 
     *      type="string"     
     *  ),
     * @SWG\Parameter(
     *      name="company_id",
     *      in="path",
     *      required=true, 
     *      type="integer",
     *      default="2"
     *  ),
     * @SWG\Parameter(
     *      name="search_keyword",
     *      in="formData",
     *      required=true, 
     *      type="string",
     *      default="Magazine Cover Page"
     *  ),    
     *  @SWG\Response(
     *      response=200,
     *      description="Success , Items object",
     *      @SWG\Schema()
     *  ),
     *  @SWG\Response(
     *      response=401,
     *      description="Unauthorized action.",
     *      @SWG\Schema()
     *  )
     * )
     **/

/**  Get Items according to barcode
     * @SWG\Get(
     *  path="/api/v1/companies/{company_id}/store/items/search/{barcode}",
     *  tags={"Item Lookup"},
     *  summary="Get Item by barcode related to store.",
     *  description="get searched item by barcode which available in store.",
     *  produces={"application/json"},
     *  @SWG\Parameter(
     *      name="Authorization",
     *      in="header",
     *      required=true, 
     *      type="string"
     *  ),
     * @SWG\Parameter(
     *      name="company_id",
     *      in="path",
     *      required=true, 
     *      type="integer",
     *      default="1"
     *  ),
     * @SWG\Parameter(
     *      name="barcode",
     *      in="path",
     *      required=true, 
     *      type="string",
     *      default="123456789"
     *  ),    
     *  @SWG\Response(
     *      response=200,
     *      description="Success , Items object",
     *      @SWG\Schema()
     *  ),
     *  @SWG\Response(
     *      response=401,
     *      description="Unauthorized action.",
     *      @SWG\Schema()
     *  )
     * )
     **/

/**  Items Return
     * @SWG\Post(
     *  path="/api/v1/companies/{company_id}/items/return",
     *  tags={"Item Return"},
     *  summary="Items return.",
     *  description="Items return",
     *  produces={"application/json"},
     *  @SWG\Parameter(
     *      name="Authorization",
     *      in="header",
     *      required=true, 
     *      type="string"     
     *  ),
     * @SWG\Parameter(
     *      name="company_id",
     *      in="path",
     *      required=true, 
     *      type="integer",
     *  ),
     * @SWG\Parameter(
     *      name="data",
     *      in="body",
     *      required=true,
     *      @SWG\Schema(ref="#/definitions/ItemReturn"),
     *  ),    
     *  @SWG\Response(
     *      response=200,
     *      description="Success , Items Return",
     *      @SWG\Schema()
     *  ),
     *  @SWG\Response(
     *      response=401,
     *      description="Unauthorized action.",
     *      @SWG\Schema()
     *  )
     * )
     **/

/**  Returned Items
     * @SWG\Get(
     *  path="/api/v1/companies/{company_id}/items/returneditems/{sale_id}",
     *  tags={"Item Return"},
     *  summary=" Returned Items list.",
     *  description="Returned items list of the sales.",
     *  produces={"application/json"},
     *  @SWG\Parameter(
     *      name="Authorization",
     *      in="header",
     *      required=true, 
     *      type="string"     
     *  ),
     * @SWG\Parameter(
     *      name="company_id",
     *      in="path",
     *      required=true, 
     *      type="integer",
     *  ),
     * @SWG\Parameter(
     *      name="sale_id",
     *      in="path",
     *      required=true, 
     *      type="integer",
     *  ),  
     *  @SWG\Response(
     *      response=200,
     *      description="Success , Returned Items",
     *      @SWG\Schema()
     *  ),
     *  @SWG\Response(
     *      response=401,
     *      description="Unauthorized action.",
     *      @SWG\Schema()
     *  )
     * )
     **/

/**  Create Store
     * @SWG\Post(
     *  path="/api/v1/companies/{company_id}/store",
     *  tags={"STORE"},
     *  summary="Create store information.",
     *  description="create store from backend.",
     *  produces={"application/json"},
     *  @SWG\Parameter(
     *      name="Authorization",
     *      in="header",
     *      required=true, 
     *      type="string"
     *  ), 
     * @SWG\Parameter(
     *      name="company_id",
     *      in="path",
     *      required=true, 
     *      type="integer",
     *      default="1"
     *  ),
     *  @SWG\Parameter(
     *      name="data",
     *      in="body",
     *      required=true,
     *      @SWG\Schema(ref="#/definitions/CreateStoreParam"),
     *  ),
     *  @SWG\Response(
     *      response=200,
     *      description="Success",
     *      @SWG\Schema(ref="#/definitions/StoreCreated")
     *  ),
     *  @SWG\Response(
     *      response=401,
     *      description="Unauthorized action.",
     *      @SWG\Schema()
     *  )
     * )
     **/

/**  Get Store
     * @SWG\Get(
     *  path="/api/v1/companies/{company_id}/store/{store_id}",
     *  tags={"STORE"},
     *  summary="Get store information.",
     *  description="get store info.",
     *  produces={"application/json"},
     *  @SWG\Parameter(
     *      name="Authorization",
     *      in="header",
     *      required=true, 
     *      type="string"
     *  ),
     * @SWG\Parameter(
     *      name="company_id",
     *      in="path",
     *      required=true, 
     *      type="integer",
     *      default="1"
     *  ),
     * @SWG\Parameter(
     *      name="store_id",
     *      in="path",
     *      required=true, 
     *      type="integer"
     *  ),    
     *  @SWG\Response(
     *      response=200,
     *      description="Success , store object",
     *      @SWG\Schema()
     *  ),
     *  @SWG\Response(
     *      response=401,
     *      description="Unauthorized action.",
     *      @SWG\Schema()
     *  )
     * )
     **/

/**  Update Store
     * @SWG\Put(
     *  path="/api/v1/companies/{company_id}/store/{store_id}",
     *  tags={"STORE"},
     *  summary="Update store information.",
     *  description="Update store from backend.",
     *  produces={"application/json"},
     *  @SWG\Parameter(
     *      name="Authorization",
     *      in="header",
     *      required=true, 
     *      type="string"
     *  ),
     * @SWG\Parameter(
     *      name="company_id",
     *      in="path",
     *      required=true, 
     *      type="integer",
     *      default="1"
     *  ),
     * @SWG\Parameter(
     *      name="store_id",
     *      in="path",
     *      required=true, 
     *      type="integer"
     *  ),
     *  @SWG\Parameter(
     *      name="data",
     *      in="body",
     *      required=true,
     *      @SWG\Schema(ref="#/definitions/CreateStoreParam"),
     *  ),
     *  @SWG\Response(
     *      response=200,
     *      description="Success",
     *      @SWG\Schema(ref="#/definitions/StoreUpdated")
     *  ),
     *  @SWG\Response(
     *      response=401,
     *      description="Unauthorized action.",
     *      @SWG\Schema()
     *  )
     * )
     **/

/**  Delete Store
     * @SWG\Delete(
     *  path="/api/v1/companies/{company_id}/store/{store_id}",
     *  tags={"STORE"},
     *  summary="Delete store information.",
     *  description="delete store info.",
     *  produces={"application/json"},
     *  @SWG\Parameter(
     *      name="Authorization",
     *      in="header",
     *      required=true, 
     *      type="string"
     *  ),
     * @SWG\Parameter(
     *      name="company_id",
     *      in="path",
     *      required=true, 
     *      type="integer",
     *      default="1"
     *  ),
     * @SWG\Parameter(
     *      name="store_id",
     *      in="path",
     *      required=true, 
     *      type="integer"
     *  ),    
     *  @SWG\Response(
     *      response=200,
     *      description="Success",
     *      @SWG\Schema(ref="#/definitions/StoreDeleted")
     *  ),
     *  @SWG\Response(
     *      response=401,
     *      description="Unauthorized action.",
     *      @SWG\Schema()
     *  )
     * )
     **/

/**  Assign device to store
     * @SWG\Put(
     *  path="/api/v1/companies/{company_id}/store/assigndevice/{deviceuid}/{store_id}",
     *  tags={"STORE"},
     *  summary="Assign device for store.",
     *  description="assign a device to a particular store .",
     *  produces={"application/json"},
     *  @SWG\Parameter(
     *      name="Authorization",
     *      in="header",
     *      required=true, 
     *      type="string"
     *  ),
     * @SWG\Parameter(
     *      name="company_id",
     *      in="path",
     *      required=true, 
     *      type="integer",
     *      default="1"
     *  ),
     * @SWG\Parameter(
     *      name="deviceuid",
     *      in="path",
     *      required=true, 
     *      type="string"
     *  ),
     * @SWG\Parameter(
     *      name="store_id",
     *      in="path",
     *      required=true, 
     *      type="integer"
     *  ),    
     *  @SWG\Response(
     *      response=200,
     *      description="Success",
     *      @SWG\Schema(ref="#/definitions/StoreAssigned")
     *  ),
     *  @SWG\Response(
     *      response=401,
     *      description="Unauthorized action.",
     *      @SWG\Schema()
     *  )
     * )
     **/

/**  Device Authentication
     * @SWG\Post(
     *  path="/api/v1/auth/deviceauth",
     *  tags={"Auth"},
     *  summary="authenticate device with store.",
     *  description="Device object to authenticate the store.",
     *  produces={"application/json"},
     * @SWG\Parameter(
     *      name="Authorization",
     *      in="header",
     *      required=true, 
     *      type="string"
     *  ),
     * @SWG\Parameter(
     *      name="company_id",
     *      in="path",
     *      required=true, 
     *      type="integer",
     *      default="1"
     *  ),
     *  @SWG\Parameter(
     *      name="data",
     *      in="body",
     *      required=true,
     *      @SWG\Schema(ref="#/definitions/DeviceAuthParam"),
     *  ),
     *  @SWG\Response(
     *      response=200,
     *      description="Success, device object",
     *      @SWG\Schema()
     *  ),
     *  @SWG\Response(
     *      response=401,
     *      description="Unauthorized action.",
     *      @SWG\Schema(ref="#/definitions/DeviceAuthError")
     *  )
     * )
     **/

/**  Quick Customer Registration
     * @SWG\Post(
     *  path="/api/v1/companies/{company_id}/lp/customer/register",
     *  tags={"Loyalty Program"},
     *  summary="Quick Customer Registration.",
     *  description="Register customer for the company.",
     *  produces={"application/json"},
     * @SWG\Parameter(
     *      name="Authorization",
     *      in="header",
     *      required=true, 
     *      type="string"
     *  ),
     * @SWG\Parameter(
     *      name="company_id",
     *      in="path",
     *      required=true, 
     *      type="integer"
     *  ),
     * @SWG\Parameter(
     *      name="name",
     *      in="formData",
     *      required=true, 
     *      type="string",
     *      default="Ajay Kumar"
     *  ),
     * @SWG\Parameter(
     *      name="mobile_number",
     *      in="formData",
     *      required=true, 
     *      type="string",
     *      default="9098303159"
     *  ),
     *  @SWG\Parameter(
     *      name="email",
     *      in="formData",
     *      required=true, 
     *      type="string",
     *      default="a@a.com"
     *  ),
     * @SWG\Parameter(
     *      name="contact_gender",
     *      in="formData",
     *      required=true, 
     *      type="string",
     *      enum={"Male","Female"}  
     *  ),   
     *  @SWG\Response(
     *      response=200,
     *      description="Success",
     *      @SWG\Schema()
     *  ),
     *  @SWG\Response(
     *      response=401,
     *      description="Unauthorized action.",
     *      @SWG\Schema()
     *  )
     * )
     **/

/**  Issue Loyalty Card
     * @SWG\Post(
     *  path="/api/v1/companies/{company_id}/lp/card/issue",
     *  tags={"Loyalty Program"},
     *  summary="Issue loyalty card and link with customer.",
     *  description="Issue loyalty card and link with customer.",
     *  produces={"application/json"},
     * @SWG\Parameter(
     *      name="Authorization",
     *      in="header",
     *      required=true, 
     *      type="string"
     *  ),
      * @SWG\Parameter(
     *      name="company_id",
     *      in="path",
     *      required=true, 
     *      type="integer"
     *  ),
     * @SWG\Parameter(
     *      name="customer_id",
     *      in="formData",
     *      required=true, 
     *      type="integer",
     *      default="553"
     *  ),
     * @SWG\Parameter(
     *      name="loyalty_card_no",
     *      in="formData",
     *      required=true, 
     *      type="string",
     *      default="9098303159"
     *  ),
     * @SWG\Parameter(
     *      name="loyalty_program_code",
     *      in="formData",
     *      required=true, 
     *      type="string",
     *      default="lol123"
     *  ),
     *  @SWG\Parameter(
     *      name="valid_till",
     *      in="formData",
     *      required=true, 
     *      type="string",
     *      format="date-time",
     *      pattern = "\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}"      
     *  ),
     *  @SWG\Response(
     *      response=200,
     *      description="Success",
     *      @SWG\Schema()
     *  ),
     *  @SWG\Response(
     *      response=401,
     *      description="Unauthorized action.",
     *      @SWG\Schema()
     *  )
     * )
     **/

/**  Renew Loyalty Card
     * @SWG\Post(
     *  path="/api/v1/companies/{company_id}/lp/card/renew",
     *  tags={"Loyalty Program"},
     *  summary="Renew loyalty card associated with customer.",
     *  description="Renew loyalty card associated with customer.",
     *  produces={"application/json"},
     * @SWG\Parameter(
     *      name="Authorization",
     *      in="header",
     *      required=true, 
     *      type="string"
     *  ), 
     * @SWG\Parameter(
     *      name="company_id",
     *      in="path",
     *      required=true, 
     *      type="integer"
     *  ),
     * @SWG\Parameter(
     *      name="loyalty_card_no",
     *      in="formData",
     *      required=true, 
     *      type="string",
     *      default="9098303159"
     *  ),
     *  @SWG\Parameter(
     *      name="valid_till",
     *      in="formData",
     *      required=true, 
     *      type="string",
     *      format="date-time",
     *      pattern = "\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}"      
     *  ),
     *  @SWG\Response(
     *      response=200,
     *      description="Success",
     *      @SWG\Schema()
     *  ),
     *  @SWG\Response(
     *      response=401,
     *      description="Unauthorized action.",
     *      @SWG\Schema()
     *  )
     * )
     **/

/**  Create Loyalty Program
     * @SWG\Post(
     *  path="/api/v1/companies/{company_id}/lp",
     *  tags={"Loyalty Program"},
     *  summary="Create Loyalty Program.",
     *  description="create loyalty program.",
     *  produces={"application/json"},
     *  @SWG\Parameter(
     *      name="Authorization",
     *      in="header",
     *      required=true, 
     *      type="string"
     *  ),
     * @SWG\Parameter(
     *      name="company_id",
     *      in="path",
     *      required=true, 
     *      type="integer"
     *  ),
     *  @SWG\Parameter(
     *      name="data",
     *      in="body",
     *      required=true,
     *      @SWG\Schema(ref="#/definitions/CreateLoyaltyProgram"),
     *  ),
     *  @SWG\Response(
     *      response=200,
     *      description="Success",
     *      @SWG\Schema()
     *  ),
     *  @SWG\Response(
     *      response=401,
     *      description="Unauthorized action.",
     *      @SWG\Schema()
     *  )
     * )
     **/

/**  Get Loyalty Program List
     * @SWG\Get(
     *  path="/api/v1/companies/{company_id}/lp",
     *  tags={"Loyalty Program"},
     *  summary="Get list of active loyalty programs.",
     *  description="Get list of active loyalty programs.",
     *  produces={"application/json"},
     *  @SWG\Parameter(
     *      name="Authorization",
     *      in="header",
     *      required=true, 
     *      type="string"
     *  ),   
     * @SWG\Parameter(
     *      name="company_id",
     *      in="path",
     *      required=true, 
     *      type="integer"
     *  ),
     *  @SWG\Response(
     *      response=200,
     *      description="Success",
     *      @SWG\Schema()
     *  ),
     *  @SWG\Response(
     *      response=401,
     *      description="Unauthorized action.",
     *      @SWG\Schema()
     *  )
     * )
     **/

/**  Get Loyalty Program
     * @SWG\Get(
     *  path="/api/v1/companies/{company_id}/lp/{loyalty_program_id}",
     *  tags={"Loyalty Program"},
     *  summary="Get loyalty program detail.",
     *  description="Get loyalty program detail.",
     *  produces={"application/json"},
     *  @SWG\Parameter(
     *      name="Authorization",
     *      in="header",
     *      required=true, 
     *      type="string"
     *  ),
     * @SWG\Parameter(
     *      name="company_id",
     *      in="path",
     *      required=true, 
     *      type="integer"
     *  ),
     * @SWG\Parameter(
     *      name="loyalty_program_id",
     *      in="path",
     *      required=true, 
     *      type="integer"
     *  ),    
     *  @SWG\Response(
     *      response=200,
     *      description="Success",
     *      @SWG\Schema()
     *  ),
     *  @SWG\Response(
     *      response=401,
     *      description="Unauthorized action.",
     *      @SWG\Schema()
     *  )
     * )
     **/

/**  Update Loyalty Program
     * @SWG\Put(
     *  path="/api/v1/companies/{company_id}/lp/{program_code}",
     *  tags={"Loyalty Program"},
     *  summary="Update Loyalty Program.",
     *  description="Update loyalty program.",
     *  produces={"application/json"},
     *  @SWG\Parameter(
     *      name="Authorization",
     *      in="header",
     *      required=true, 
     *      type="string"
     *  ),
     * @SWG\Parameter(
     *      name="company_id",
     *      in="path",
     *      required=true, 
     *      type="integer"
     *  ),
     * @SWG\Parameter(
     *      name="program_code",
     *      in="path",
     *      required=true, 
     *      type="string"
     *  ), 
     *  @SWG\Parameter(
     *      name="data",
     *      in="body",
     *      required=true,
     *      @SWG\Schema(ref="#/definitions/UpdateLoyaltyProgram"),
     *  ),
     *  @SWG\Response(
     *      response=200,
     *      description="Success",
     *      @SWG\Schema()
     *  ),
     *  @SWG\Response(
     *      response=401,
     *      description="Unauthorized action.",
     *      @SWG\Schema()
     *  )
     * )
     **/

/**  Delete Loyalty Program
     * @SWG\Delete(
     *  path="/api/v1/companies/{company_id}/lp/{loyalty_program_id}",
     *  tags={"Loyalty Program"},
     *  summary="Delete Loyalty Program.",
     *  description="delete loyalty program.",
     *  produces={"application/json"},
     *  @SWG\Parameter(
     *      name="Authorization",
     *      in="header",
     *      required=true, 
     *      type="string"
     *  ),
     * @SWG\Parameter(
     *      name="company_id",
     *      in="path",
     *      required=true, 
     *      type="integer"
     *  ),
     * @SWG\Parameter(
     *      name="loyalty_program_id",
     *      in="path",
     *      required=true, 
     *      type="integer"
     *  ),    
     *  @SWG\Response(
     *      response=200,
     *      description="Success",
     *      @SWG\Schema()
     *  ),
     *  @SWG\Response(
     *      response=401,
     *      description="Unauthorized action.",
     *      @SWG\Schema()
     *  )
     * )
     **/

/**  Save sales Detail
     * @SWG\Post(
     *  path="/api/v1/companies/{company_id}/sales",
     *  tags={"Sales"},
     *  summary="Save sales detail.",
     *  description="Save data of sales after sales done.",
     *  produces={"application/json"},
     *  @SWG\Parameter(
     *      name="Authorization",
     *      in="header",
     *      required=true, 
     *      type="string"
     *  ),  
     * @SWG\Parameter(
     *      name="company_id",
     *      in="path",
     *      required=true, 
     *      type="integer"
     *  ),
     *  @SWG\Parameter(
     *      name="data",
     *      in="body",
     *      required=true,
     *      @SWG\Schema(ref="#/definitions/SaveSalesData"),
     *  ),
     *  @SWG\Response(
     *      response=200,
     *      description="Success",
     *      @SWG\Schema()
     *  ),
     *  @SWG\Response(
     *      response=401,
     *      description="Unauthorized action.",
     *      @SWG\Schema()
     *  )
     * )
     **/

/**  Check Customer Available Loyalty Points
     * @SWG\Get(
     *  path="/api/v1/companies/{company_id}/lp/getpoints/{loyalty_card_no}",
     *  tags={"Loyalty Points"},
     *  summary="Check customer available loyalty points details.",
     *  description="Check customer available loyalty points details.",
     *  produces={"application/json"},
     *  @SWG\Parameter(
     *      name="Authorization",
     *      in="header",
     *      required=true, 
     *      type="string"
     *  ),
     * @SWG\Parameter(
     *      name="company_id",
     *      in="path",
     *      required=true, 
     *      type="integer"
     *  ),
     * @SWG\Parameter(
     *      name="loyalty_card_no",
     *      in="path",
     *      required=true, 
     *      type="string"
     *  ),    
     *  @SWG\Response(
     *      response=200,
     *      description="Success",
     *      @SWG\Schema()
     *  ),
     *  @SWG\Response(
     *      response=401,
     *      description="Unauthorized action.",
     *      @SWG\Schema()
     *  )
     * )
     **/

/**  Redeemed Loyalty Points
     * @SWG\Post(
     *  path="/api/v1/companies/{company_id}/lp/redeem",
     *  tags={"Loyalty Points"},
     *  summary="Redeem loyalty points.",
     *  description="Redeem loyalty points.",
     *  produces={"application/json"},
     *  @SWG\Parameter(
     *      name="Authorization",
     *      in="header",
     *      required=true, 
     *      type="string"
     *  ),
     * @SWG\Parameter(
     *      name="company_id",
     *      in="path",
     *      required=true, 
     *      type="integer"
     *  ),
     * @SWG\Parameter(
     *      name="customer_id",
     *      in="formData",
     *      required=true, 
     *      type="integer"
     *  ),    
     * @SWG\Parameter(
     *      name="loyalty_card_no",
     *      in="formData",
     *      required=true, 
     *      type="string"
     *  ),    
     * @SWG\Parameter(
     *      name="points",
     *      in="formData",
     *      required=true, 
     *      type="integer"
     *  ),    
     *  @SWG\Response(
     *      response=200,
     *      description="Success",
     *      @SWG\Schema()
     *  ),
     *  @SWG\Response(
     *      response=401,
     *      description="Unauthorized action.",
     *      @SWG\Schema()
     *  )
     * )
     **/

/**  Sales Detail
     * @SWG\get(
     *  path="/api/v1/companies/{company_id}/sales/detail/{sale_id}",
     *  tags={"Sales"},
     *  summary="Sales detail.",
     *  description="Sales Detail.",
     *  produces={"application/json"},
     *  @SWG\Parameter(
     *      name="Authorization",
     *      in="header",
     *      required=true, 
     *      type="string"
     *  ),    
     * @SWG\Parameter(
     *      name="company_id",
     *      in="path",
     *      required=true, 
     *      type="integer"
     *  ),
     *  @SWG\Parameter(
     *      name="sale_id",
     *      in="path",
     *      required=true,
     *      type="integer",
     *  ),
     *  @SWG\Response(
     *      response=200,
     *      description="Success",
     *      @SWG\Schema()
     *  ),
     *  @SWG\Response(
     *      response=401,
     *      description="Unauthorized action.",
     *      @SWG\Schema()
     *  )
     * )
     **/

/**  Bill Detail
     * @SWG\get(
     *  path="/api/v1/companies/{company_id}/sales/bill/detail/{bill_no}",
     *  tags={"Sales"},
     *  summary="Bill detail.",
     *  description="Bill Detail.",
     *  produces={"application/json"},
     *  @SWG\Parameter(
     *      name="Authorization",
     *      in="header",
     *      required=true, 
     *      type="string"
     *  ),    
     * @SWG\Parameter(
     *      name="company_id",
     *      in="path",
     *      required=true, 
     *      type="integer"
     *  ),
     *  @SWG\Parameter(
     *      name="bill_no",
     *      in="path",
     *      required=true,
     *      type="integer",
     *  ),
     *  @SWG\Response(
     *      response=200,
     *      description="Success",
     *      @SWG\Schema()
     *  ),
     *  @SWG\Response(
     *      response=401,
     *      description="Unauthorized action.",
     *      @SWG\Schema()
     *  )
     * )
     **/

/**  View sales order detail by status, sales_staff_id, item_id, category or date.
     * @SWG\Get(
     *  path="/api/v1/companies/{company_id}/sales/filter",
     *  tags={"Sales"},
     *  summary="View sales detail.",
     *  description="View sales order detail by status, sales_staff_id, item_id, category or date.",
     *  produces={"application/json"},
     *  @SWG\Parameter(
     *      name="Authorization",
     *      in="header",
     *      required=true, 
     *      type="string"
     *  ),
     * @SWG\Parameter(
     *      name="company_id",
     *      in="path",
     *      required=true, 
     *      type="integer"
     *  ), 
     * @SWG\Parameter(
     *      name="status",
     *      in="query",
     *      type="string",
     *      enum={"APPROVED","REJECTED","DELETED","PENDING","CANCELED"}
     *  ),
     * @SWG\Parameter(
     *      name="sales_staff_id",
     *      in="query",
     *      type="integer",
     *  ),
     * @SWG\Parameter(
     *      name="item_id",
     *      in="query",
     *      type="integer",
     *  ),
     * @SWG\Parameter(
     *      name="category",
     *      in="query",
     *      type="integer",
     *  ),
     * @SWG\Parameter(
     *      name="date",
     *      in="query",
     *      type="string",
     *      format="date-time",
     *      pattern = "\d{4}-\d{2}-\d{2}"      
     *  ),
     *  @SWG\Response(
     *      response=200,
     *      description="Success",
     *      @SWG\Schema()
     *  ),
     *  @SWG\Response(
     *      response=401,
     *      description="Unauthorized action.",
     *      @SWG\Schema()
     *  )
     * )
     **/
        
/**  Assign Coupon Book
     * @SWG\Post(
     *  path="/api/v1/companies/{company_id}/coupons/assign/booklet",
     *  tags={"Coupons"},
     *  summary="Assign coupon book to sales person.",
     *  description="Assign coupon book to sales person.",
     *  produces={"application/json"},
     *  @SWG\Parameter(
     *      name="Authorization",
     *      in="header",
     *      required=true, 
     *      type="string"
     *  ), 
     * @SWG\Parameter(
     *      name="company_id",
     *      in="path",
     *      required=true, 
     *      type="integer"
     *  ), 
     *  @SWG\Parameter(
     *      name="data",
     *      in="body",
     *      required=true,
     *      @SWG\Schema(ref="#/definitions/AssignCouponBookData"),
     *  ),
     *  @SWG\Response(
     *      response=200,
     *      description="Success",
     *      @SWG\Schema()
     *  ),
     *  @SWG\Response(
     *      response=401,
     *      description="Unauthorized action.",
     *      @SWG\Schema()
     *  )
     * )
     **/

/**  Save Coupon Detail
     * @SWG\Post(
     *  path="/api/v1/companies/{company_id}/coupons/save",
     *  tags={"Coupons"},
     *  summary="Save coupon detail.",
     *  description="Save coupon detail.",
     *  produces={"application/json"},
     *  @SWG\Parameter(
     *      name="Authorization",
     *      in="header",
     *      required=true, 
     *      type="string"
     *  ),   
     * @SWG\Parameter(
     *      name="company_id",
     *      in="path",
     *      required=true, 
     *      type="integer"
     *  ),   
     *  @SWG\Parameter(
     *      name="data",
     *      in="body",
     *      required=true,
     *      @SWG\Schema(ref="#/definitions/SaveCouponInfoData"),
     *  ),
     *  @SWG\Response(
     *      response=200,
     *      description="Success",
     *      @SWG\Schema()
     *  ),
     *  @SWG\Response(
     *      response=401,
     *      description="Unauthorized action.",
     *      @SWG\Schema()
     *  )
     * )
     **/

/**  Track Coupon information
     * @SWG\Get(
     *  path="/api/v1/companies/{company_id}/coupons/{coupon_code}",
     *  tags={"Coupons"},
     *  summary="Track Coupon information.",
     *  description="Track Coupon information.",
     *  produces={"application/json"},
     *  @SWG\Parameter(
     *      name="Authorization",
     *      in="header",
     *      required=true, 
     *      type="string"
     *  ),
     * @SWG\Parameter(
     *      name="company_id",
     *      in="path",
     *      required=true, 
     *      type="integer"
     *  ),  
     * @SWG\Parameter(
     *      name="coupon_code",
     *      in="path",
     *      required=true, 
     *      type="integer"
     *  ),    
     *  @SWG\Response(
     *      response=200,
     *      description="Success",
     *      @SWG\Schema()
     *  ),
     *  @SWG\Response(
     *      response=401,
     *      description="Unauthorized action.",
     *      @SWG\Schema()
     *  )
     * )
     **/

/**  Track Coupon Book information
     * @SWG\Get(
     *  path="/api/v1/companies/{company_id}/coupons/booklet/{booklet_no}",
     *  tags={"Coupons"},
     *  summary="Track Coupon Book information.",
     *  description="Track Coupon Book information.",
     *  produces={"application/json"},
     *  @SWG\Parameter(
     *      name="Authorization",
     *      in="header",
     *      required=true, 
     *      type="string"
     *  ),
     * @SWG\Parameter(
     *      name="company_id",
     *      in="path",
     *      required=true, 
     *      type="integer"
     *  ),  
     * @SWG\Parameter(
     *      name="booklet_no",
     *      in="path",
     *      required=true, 
     *      type="integer"
     *  ),  
     *  @SWG\Response(
     *      response=200,
     *      description="Success",
     *      @SWG\Schema()
     *  ),
     *  @SWG\Response(
     *      response=401,
     *      description="Unauthorized action.",
     *      @SWG\Schema()
     *  )
     * )
     **/

/**  Create promotion
     * @SWG\Post(
     *  path="/api/v1/companies/{company_id}/promotions",
     *  tags={"Promotions"},
     *  summary="Create promotions for the company and assign the item under promotion.",
     *  description="Create promotions for the company and assign the item under promotion.",
     *  produces={"application/json"},
     *  @SWG\Parameter(
     *      name="Authorization",
     *      in="header",
     *      required=true, 
     *      type="string"
     *  ), 
     * @SWG\Parameter(
     *      name="company_id",
     *      in="path",
     *      required=true, 
     *      type="integer"
     *  ), 
     *  @SWG\Parameter(
     *      name="data",
     *      in="body",
     *      required=true,
     *      @SWG\Schema(ref="#/definitions/CreatePromotion"),
     *  ),
     *  @SWG\Response(
     *      response=200,
     *      description="Success",
     *      @SWG\Schema()
     *  ),
     *  @SWG\Response(
     *      response=401,
     *      description="Unauthorized action.",
     *      @SWG\Schema()
     *  )
     * )
     **/

/**  Update promotion
     * @SWG\Put(
     *  path="/api/v1/companies/{company_id}/promotions/{promotion_id}",
     *  tags={"Promotions"},
     *  summary="Update promotions for the company .",
     *  description="Update promotions for the company and reassign the item under promotion.",
     *  produces={"application/json"},
     *  @SWG\Parameter(
     *      name="Authorization",
     *      in="header",
     *      required=true, 
     *      type="string"
     *  ), 
     * @SWG\Parameter(
     *      name="company_id",
     *      in="path",
     *      required=true, 
     *      type="integer"
     *  ),
     * @SWG\Parameter(
     *      name="promotion_id",
     *      in="path",
     *      required=true, 
     *      type="integer"
     *  ),     
     *  @SWG\Parameter(
     *      name="data",
     *      in="body",
     *      required=true,
     *      @SWG\Schema(ref="#/definitions/UpdatePromotion"),
     *  ),
     *  @SWG\Response(
     *      response=200,
     *      description="Success",
     *      @SWG\Schema()
     *  ),
     *  @SWG\Response(
     *      response=401,
     *      description="Unauthorized action.",
     *      @SWG\Schema()
     *  )
     * )
     **/

/**  Delete Promotion
     * @SWG\Delete(
     *  path="/api/v1/companies/{company_id}/promotions/{promotion_id}",
     *  tags={"Promotions"},
     *  summary="Delete promotion.",
     *  description="delete promotion with assigned item under promotion.",
     *  produces={"application/json"},
     *  @SWG\Parameter(
     *      name="Authorization",
     *      in="header",
     *      required=true, 
     *      type="string"
     *  ),
     * @SWG\Parameter(
     *      name="company_id",
     *      in="path",
     *      required=true, 
     *      type="integer"
     *  ),
     * @SWG\Parameter(
     *      name="promotion_id",
     *      in="path",
     *      required=true, 
     *      type="integer"
     *  ),    
     *  @SWG\Response(
     *      response=200,
     *      description="Success",
     *      @SWG\Schema()
     *  ),
     *  @SWG\Response(
     *      response=401,
     *      description="Unauthorized action.",
     *      @SWG\Schema()
     *  )
     * )
     **/

/**  Get Promotion
     * @SWG\Get(
     *  path="/api/v1/companies/{company_id}/promotions/{promotion_id}",
     *  tags={"Promotions"},
     *  summary="Get promotion.",
     *  description="get promotion detail with assigned item under promotion.",
     *  produces={"application/json"},
     *  @SWG\Parameter(
     *      name="Authorization",
     *      in="header",
     *      required=true, 
     *      type="string"
     *  ),
     * @SWG\Parameter(
     *      name="company_id",
     *      in="path",
     *      required=true, 
     *      type="integer"
     *  ),
     * @SWG\Parameter(
     *      name="promotion_id",
     *      in="path",
     *      required=true, 
     *      type="integer"
     *  ),    
     *  @SWG\Response(
     *      response=200,
     *      description="Success",
     *      @SWG\Schema()
     *  ),
     *  @SWG\Response(
     *      response=401,
     *      description="Unauthorized action.",
     *      @SWG\Schema()
     *  )
     * )
     **/

/**  Get Promotion List
     * @SWG\Get(
     *  path="/api/v1/companies/{company_id}/promotions/{status}/{type}",
     *  tags={"Promotions"},
     *  summary="Get list of promotion.",
     *  description="Get the list of promotions according to status with included item in promotion.",
     *  produces={"application/json"},
     *  @SWG\Parameter(
     *      name="Authorization",
     *      in="header",
     *      required=true, 
     *      type="string"
     *  ),
     * @SWG\Parameter(
     *      name="company_id",
     *      in="path",
     *      required=true, 
     *      type="integer"
     *  ), 
     * @SWG\Parameter(
     *      name="status",
     *      in="path",
     *      required=true, 
     *      type="string",
     *      enum={"unapproved","approved","rejected"}
     *  ),
     * @SWG\Parameter(
     *      name="type",
     *      in="path",
     *      required=true, 
     *      type="string",
     *      enum={"all","active","inactive"}
     *  ),   
     *  @SWG\Response(
     *      response=200,
     *      description="Success",
     *      @SWG\Schema()
     *  ),
     *  @SWG\Response(
     *      response=401,
     *      description="Unauthorized action.",
     *      @SWG\Schema()
     *  )
     * )
     **/

/**  Approved-unapproved promotion
     * @SWG\Put(
     *  path="/api/v1/companies/{company_id}/promotions/{promotion_id}/{status}/{employee_id}",
     *  tags={"Promotions"},
     *  summary="Approve-Unapprove promotion.",
     *  description="Change the status of promotion as approved or unapproved.",
     *  produces={"application/json"},
     *  @SWG\Parameter(
     *      name="Authorization",
     *      in="header",
     *      required=true, 
     *      type="string"
     *  ),
     * @SWG\Parameter(
     *      name="company_id",
     *      in="path",
     *      required=true, 
     *      type="integer"
     *  ), 
     * @SWG\Parameter(
     *      name="promotion_id",
     *      in="path",
     *      required=true, 
     *      type="integer"
     *  ),
     * @SWG\Parameter(
     *      name="status",
     *      in="path",
     *      required=true, 
     *      type="string",
     *      enum={"unapproved","approved","rejected"}
     *  ),     
     * @SWG\Parameter(
     *      name="employee_id",
     *      in="path",
     *      required=true, 
     *      type="integer"
     *  ),    
     *  @SWG\Response(
     *      response=200,
     *      description="Success",
     *      @SWG\Schema()
     *  ),
     *  @SWG\Response(
     *      response=401,
     *      description="Unauthorized action.",
     *      @SWG\Schema()
     *  )
     * )
     **/

/**  Check promotion on item
     * @SWG\Post(
     *  path="/api/v1/companies/{company_id}/promotions/promotion-on-item",
     *  tags={"Promotions"},
     *  summary="Check whether promotion is on items or not.",
     *  description="Check whether promotion is on items or not.",
     *  produces={"application/json"},
     *  @SWG\Parameter(
     *      name="Authorization",
     *      in="header",
     *      required=true, 
     *      type="string"
     *  ),     
     * @SWG\Parameter(
     *      name="company_id",
     *      in="path",
     *      required=true, 
     *      type="integer"
     *  ), 
     *  @SWG\Parameter(
     *      name="data",
     *      in="body",
     *      required=true,
     *      @SWG\Schema(ref="#/definitions/CheckPromotion"),
     *  ),
     *  @SWG\Response(
     *      response=200,
     *      description="Success",
     *      @SWG\Schema()
     *  ),
     *  @SWG\Response(
     *      response=401,
     *      description="Unauthorized action.",
     *      @SWG\Schema()
     *  )
     * )
     **/

/**  Save tax rules
     * @SWG\Post(
     *  path="/api/v1/companies/{company_id}/taxes",
     *  tags={"Taxes"},
     *  summary="Create tax rule.",
     *  description="Create tax rule according to country and state wise.",
     *  produces={"application/json"},
     *  @SWG\Parameter(
     *      name="Authorization",
     *      in="header",
     *      required=true, 
     *      type="string"
     *  ), 
     *  @SWG\Parameter(
     *      name="company_id",
     *      in="path",
     *      required=true, 
     *      type="integer"
     *  ),      
     *  @SWG\Parameter(
     *      name="data",
     *      in="body",
     *      required=true,
     *      @SWG\Schema(ref="#/definitions/SaveTaxRule"),
     *  ),
     *  @SWG\Response(
     *      response=200,
     *      description="Success",
     *      @SWG\Schema()
     *  ),
     *  @SWG\Response(
     *      response=401,
     *      description="Unauthorized action.",
     *      @SWG\Schema()
     *  )
     * )
     **/

/**  Update Tax
     * @SWG\Put(
     *  path="/api/v1/companies/{company_id}/taxes/{tax_id}",
     *  tags={"Taxes"},
     *  summary="Update tax information.",
     *  description="Update tax.",
     *  produces={"application/json"},
     *  @SWG\Parameter(
     *      name="Authorization",
     *      in="header",
     *      required=true, 
     *      type="string"
     *  ),
     *  @SWG\Parameter(
     *      name="company_id",
     *      in="path",
     *      required=true, 
     *      type="integer"
     *  ), 
     * @SWG\Parameter(
     *      name="tax_id",
     *      in="path",
     *      required=true, 
     *      type="integer"
     *  ),
     *  @SWG\Parameter(
     *      name="data",
     *      in="body",
     *      required=true,
     *      @SWG\Schema(ref="#/definitions/UpdateTaxRule"),
     *  ),
     *  @SWG\Response(
     *      response=200,
     *      description="Success",
     *      @SWG\Schema()
     *  ),
     *  @SWG\Response(
     *      response=401,
     *      description="Unauthorized action.",
     *      @SWG\Schema()
     *  )
     * )
     **/

/**  Delete Tax
     * @SWG\Delete(
     *  path="/api/v1/companies/{company_id}/taxes/{tax_id}",
     *  tags={"Taxes"},
     *  summary="Delete tax.",
     *  description="delete tax info.",
     *  produces={"application/json"},
     *  @SWG\Parameter(
     *      name="Authorization",
     *      in="header",
     *      required=true, 
     *      type="string"
     *  ),
     *  @SWG\Parameter(
     *      name="company_id",
     *      in="path",
     *      required=true, 
     *      type="integer"
     *  ),
     * @SWG\Parameter(
     *      name="tax_id",
     *      in="path",
     *      required=true, 
     *      type="integer"
     *  ),    
     *  @SWG\Response(
     *      response=200,
     *      description="Success",
     *      @SWG\Schema(ref="#/definitions/TaxDeleted")
     *  ),
     *  @SWG\Response(
     *      response=401,
     *      description="Unauthorized action.",
     *      @SWG\Schema()
     *  )
     * )
     **/

/**  Get Tax rules List
     * @SWG\Get(
     *  path="/api/v1/companies/{company_id}/taxes",
     *  tags={"Taxes"},
     *  summary="Get list of tax rules according to company.",
     *  description="list of tax rules according to company.",
     *  produces={"application/json"},
     *  @SWG\Parameter(
     *      name="Authorization",
     *      in="header",
     *      required=true, 
     *      type="string"
     *  ),
     *  @SWG\Parameter(
     *      name="company_id",
     *      in="path",
     *      required=true, 
     *      type="integer"
     *  ),
     * @SWG\Parameter(
     *      name="country_id",
     *      in="query",
     *      required=false, 
     *      type="integer"
     *  ), 
     * @SWG\Parameter(
     *      name="state_id",
     *      in="query",
     *      required=false, 
     *      type="integer"
     *  ), 
     * @SWG\Parameter(
     *      name="zip_postal_code",
     *      in="query",
     *      required=false, 
     *      type="integer"
     *  ),          
     *  @SWG\Response(
     *      response=200,
     *      description="Success",
     *      @SWG\Schema()
     *  ),
     *  @SWG\Response(
     *      response=401,
     *      description="Unauthorized action.",
     *      @SWG\Schema()
     *  )
     * )
     **/

/**  Save Procurement
     * @SWG\Post(
     *  path="/api/v1/companies/{company_id}/procurement/create",
     *  tags={"Procurement"},
     *  summary="Create procurement.",
     *  description="Create procurement",
     *  produces={"application/json"},
     *  @SWG\Parameter(
     *      name="Authorization",
     *      in="header",
     *      required=true, 
     *      type="string"
     *  ),
     *  @SWG\Parameter(
     *      name="company_id",
     *      in="path",
     *      required=true, 
     *      type="integer"
     *  ),     
     *  @SWG\Parameter(
     *      name="data",
     *      in="body",
     *      required=false,
     *      @SWG\Schema(ref="#/definitions/SaveProcurement"),
     *  ),
     *  @SWG\Response(
     *      response=200,
     *      description="Success",
     *      @SWG\Schema()
     *  ),
     *  @SWG\Response(
     *      response=401,
     *      description="Unauthorized action.",
     *      @SWG\Schema()
     *  )
     * )
     **/

/**  Customer lookup details
     * @SWG\Get(
     *  path="/api/v1/companies/{company_id}/lp/customer/lookup/{mobile_number}",
     *  tags={"Loyalty Program"},
     *  summary="Customer lookup details.",
     *  description="Show customer details according to mobile number",
     *  produces={"application/json"},
     *  @SWG\Parameter(
     *      name="Authorization",
     *      in="header",
     *      required=true, 
     *      type="string"
     *  ),    
     *  @SWG\Parameter(
     *      name="company_id",
     *      in="path",
     *      required=true,
     *      type="integer"
     *  ),
     *  @SWG\Parameter(
     *      name="mobile_number",
     *      in="path",
     *      required=true,
     *      type="string"
     *  ),
     *  @SWG\Response(
     *      response=200,
     *      description="Success",
     *      @SWG\Schema()
     *  ),
     *  @SWG\Response(
     *      response=401,
     *      description="Unauthorized action.",
     *      @SWG\Schema()
     *  )
     * )
     **/

/**  Get discount limit of employee
     * @SWG\Get(
     *  path="/api/v1/companies/{company_id}/discount/limit/get",
     *  tags={"Discount Limit"},
     *  summary="Get discount limit of employee with manager role.",
     *  description="Get discount limit of employee with manager role",
     *  produces={"application/json"},
     *  @SWG\Parameter(
     *      name="Authorization",
     *      in="header",
     *      required=true, 
     *      type="string"
     *  ),    
     *  @SWG\Parameter(
     *      name="company_id",
     *      in="path",
     *      required=true,
     *      type="integer"
     *  ),  
     *  @SWG\Response(
     *      response=200,
     *      description="Success",
     *      @SWG\Schema()
     *  ),
     *  @SWG\Response(
     *      response=401,
     *      description="Unauthorized action.",
     *      @SWG\Schema()
     *  )
     * )
     **/

/**  Get customer's purchase detail
     * @SWG\Get(
     *  path="/api/v1/companies/{company_id}/sales/detail/purchase/{customer_id}",
     *  tags={"Sales"},
     *  summary="Get customer's purchase detail.",
     *  description="Get customer's purchase detail",
     *  produces={"application/json"},
     *  @SWG\Parameter(
     *      name="Authorization",
     *      in="header",
     *      required=true, 
     *      type="string"
     *  ),    
     *  @SWG\Parameter(
     *      name="company_id",
     *      in="path",
     *      required=true,
     *      type="integer"
     *  ),  
     *  @SWG\Parameter(
     *      name="customer_id",
     *      in="path",
     *      required=true,
     *      type="integer"
     *  ),  
     *  @SWG\Response(
     *      response=200,
     *      description="Success",
     *      @SWG\Schema()
     *  ),
     *  @SWG\Response(
     *      response=401,
     *      description="Unauthorized action.",
     *      @SWG\Schema()
     *  )
     * )    
     **/

/**  Get customer's canceled bill detail
     * @SWG\Get(
     *  path="/api/v1/companies/{company_id}/sales/view/cancel-bill",
     *  tags={"Sales"},
     *  summary="Get customer's canceled bill detail.",
     *  description="Get customer's canceled bill detail",
     *  produces={"application/json"},
     *  @SWG\Parameter(
     *      name="Authorization",
     *      in="header",
     *      required=true, 
     *      type="string"
     *  ),    
     *  @SWG\Parameter(
     *      name="company_id",
     *      in="path",
     *      required=true,
     *      type="integer"
     *  ),  
     *  @SWG\Parameter(
     *      name="sale_id",
     *      in="query",
     *      type="integer"
     *  ),  
     *  @SWG\Response(
     *      response=200,
     *      description="Success",
     *      @SWG\Schema()
     *  ),
     *  @SWG\Response(
     *      response=401,
     *      description="Unauthorized action.",
     *      @SWG\Schema()
     *  )
     * )    
     **/

/**  Cancel customer bill.
     * @SWG\Post(
     *  path="/api/v1/companies/{company_id}/sales/cancel/{sale_id}",
     *  tags={"Sales"},
     *  summary="Cancel customer bill by sale id and update inventory after cancel the bill.",
     *  description="Cancel customer bill by sale id and update inventory after cancel the bill.",
     *  produces={"application/json"},
     *  @SWG\Parameter(
     *      name="Authorization",
     *      in="header",
     *      required=true, 
     *      type="string"
     *  ),    
     *  @SWG\Parameter(
     *      name="company_id",
     *      in="path",
     *      required=true,
     *      type="integer"
     *  ),  
     *  @SWG\Parameter(
     *      name="sale_id",
     *      in="path",
     *      required=true,
     *      type="integer"
     *  ),  
     *  @SWG\Response(
     *      response=200,
     *      description="Success",
     *      @SWG\Schema()
     *  ),
     *  @SWG\Response(
     *      response=401,
     *      description="Unauthorized action.",
     *      @SWG\Schema()
     *  )
     * )    
     **/

/**  Create discount limit
     * @SWG\Post(
     *  path="/api/v1/companies/{company_id}/discount/limit",
     *  tags={"Discount Limit"},
     *  summary="Create discount limit.",
     *  description="Create discount limit for the sale manager",
     *  produces={"application/json"},
     *  @SWG\Parameter(
     *      name="Authorization",
     *      in="header",
     *      required=true, 
     *      type="string"
     *  ), 
     *  @SWG\Parameter(
     *      name="company_id",
     *      in="path",
     *      required=true, 
     *      type="integer"
     *  ),      
     *  @SWG\Parameter(
     *      name="data",
     *      in="body",
     *      required=true,
     *      @SWG\Schema(ref="#/definitions/CreateDiscount"),
     *  ),
     *  @SWG\Response(
     *      response=200,
     *      description="Success",
     *      @SWG\Schema()
     *  ),
     *  @SWG\Response(
     *      response=401,
     *      description="Unauthorized action.",
     *      @SWG\Schema()
     *  )
     * )
     **/

/**  Get list of discount limit
     * @SWG\Get(
     *  path="/api/v1/companies/{company_id}/discount/limit",
     *  tags={"Discount Limit"},
     *  summary="Get list of discount limit for managers.",
     *  description="Get list of discount limit for managers.",
     *  produces={"application/json"},
     *  @SWG\Parameter(
     *      name="Authorization",
     *      in="header",
     *      required=true, 
     *      type="string"
     *  ), 
     *  @SWG\Parameter(
     *      name="company_id",
     *      in="path",
     *      required=true, 
     *      type="integer"
     *  ),  
     *  @SWG\Response(
     *      response=200,
     *      description="Success",
     *      @SWG\Schema()
     *  ),
     *  @SWG\Response(
     *      response=401,
     *      description="Unauthorized action.",
     *      @SWG\Schema()
     *  )
     * )
     **/

/**  Update discount limit
     * @SWG\Put(
     *  path="/api/v1/companies/{company_id}/discount/limit/{employee_id}",
     *  tags={"Discount Limit"},
     *  summary="Update discount limit.",
     *  description="Update discount limit for the sale manager",
     *  produces={"application/json"},
     *  @SWG\Parameter(
     *      name="Authorization",
     *      in="header",
     *      required=true, 
     *      type="string"
     *  ), 
     *  @SWG\Parameter(
     *      name="company_id",
     *      in="path",
     *      required=true, 
     *      type="integer"
     *  ),
     *  @SWG\Parameter(
     *      name="employee_id",
     *      in="path",
     *      required=true, 
     *      type="integer"
     *  ),       
     *  @SWG\Parameter(
     *      name="data",
     *      in="body",
     *      required=true,
     *      @SWG\Schema(ref="#/definitions/UpdateDiscount"),
     *  ),
     *  @SWG\Response(
     *      response=200,
     *      description="Success",
     *      @SWG\Schema()
     *  ),
     *  @SWG\Response(
     *      response=401,
     *      description="Unauthorized action.",
     *      @SWG\Schema()
     *  )
     * )
     **/

/**  Delete discount limit
     * @SWG\Delete(
     *  path="/api/v1/companies/{company_id}/discount/limit/{employee_id}",
     *  tags={"Discount Limit"},
     *  summary="Delete discount limit.",
     *  description="Delete discount limit",
     *  produces={"application/json"},
     *  @SWG\Parameter(
     *      name="Authorization",
     *      in="header",
     *      required=true, 
     *      type="string"
     *  ), 
     *  @SWG\Parameter(
     *      name="company_id",
     *      in="path",
     *      required=true, 
     *      type="integer"
     *  ),
     *  @SWG\Parameter(
     *      name="employee_id",
     *      in="path",
     *      required=true, 
     *      type="integer"
     *  ),    
     *  @SWG\Response(
     *      response=200,
     *      description="Success",
     *      @SWG\Schema()
     *  ),
     *  @SWG\Response(
     *      response=401,
     *      description="Unauthorized action.",
     *      @SWG\Schema()
     *  )
     * )
     **/

/**  Check Coupon
     * @SWG\Get(
     *  path="/api/v1/companies/{company_id}/coupons/validate/{coupon_code}",
     *  tags={"Coupons"},
     *  summary="Check coupon valid or not.",
     *  description="Check coupon valid or not with all the detail of coupon",
     *  produces={"application/json"},
     *  @SWG\Parameter(
     *      name="Authorization",
     *      in="header",
     *      required=true, 
     *      type="string"
     *  ), 
     *  @SWG\Parameter(
     *      name="company_id",
     *      in="path",
     *      required=true, 
     *      type="integer"
     *  ),
     *  @SWG\Parameter(
     *      name="coupon_code",
     *      in="path",
     *      required=true, 
     *      type="integer"
     *  ),    
     *  @SWG\Response(
     *      response=200,
     *      description="Success",
     *      @SWG\Schema()
     *  ),
     *  @SWG\Response(
     *      response=401,
     *      description="Unauthorized action.",
     *      @SWG\Schema()
     *  )
     * )
     **/
