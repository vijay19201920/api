<?php

/**
 * @SWG\Definition(
 *      definition="AuthParam",
 *      type="object",
 *      description="device and user info",
 *      required={"username", "deviceuid"},
 *      @SWG\Property(property="username", type="string", example="demoowner"),
 *      @SWG\Property(property="deviceuid", type="string", example="uid1234")
 * ),
 * @SWG\Definition(
 *      definition="DeviceAuthError",
 *      type="object",
 *      description="device and user info",
 *      @SWG\Property(property="message", type="string", example="AuthenticationFailed"),
 *      @SWG\Property(property="device", type="string", example="null"),
 *      @SWG\Property(property="status", type="string", example="error")
 * ),
 * @SWG\Definition(
 *      definition="SaveCashDrawerParam",
 *      type="object",
 *      description="Cash drawer param object",
 *      required={"deviceuid", "user_id", "total" , "activity","denomination"},
 *      @SWG\Property(property="deviceuid", type="string", example="uid1234"),
 *      @SWG\Property(property="user_id", type="string", example="121"),
 *      @SWG\Property(property="total", type="integer", example=1500),
 *      @SWG\Property(property="activity", type="string", example="login or logout"),
 *      @SWG\Property(
 *          property="denomination",
 *          type="array",
 *          @SWG\Items(
 *              @SWG\Property(property="currency_note", type="integer", example=500),
 *              @SWG\Property(property="count", type="integer", example=3),
 *              @SWG\Property(property="amount", type="integer", example=1500)
 *          )
 *      )
 * ),
 * @SWG\Definition(
 *      definition="SaveCashDrawerResponseMatch",
 *      type="object",
 *      description="Cash drawer match or updated",
 *      @SWG\Property(property="message", type="string", example="MatchSuccess or DrawerUpdated"),
 *      @SWG\Property(property="status", type="string", example="success")
 * ), 
 * @SWG\Definition(
 *      definition="SaveCashDrawerErrorNotMatch",
 *      type="object",
 *      description="Cash drawer not match",
 *      @SWG\Property(property="message", type="string", example="NotMatched"),
 *      @SWG\Property(property="status", type="string", example="error")
 * ),
 * @SWG\Definition(
 *      definition="GetCashDrawerError",
 *      type="object",
 *      description="Cash drawer not found",
 *      @SWG\Property(property="cash_drawer", type="string", example="null"),
 *      @SWG\Property(property="status", type="string", example="error")
 * ),
 * @SWG\Definition(
 *      definition="SuccessUser",
 *      type="object",
 *      description="Successfully created user!",
 *      @SWG\Property(property="message", type="string", example="Password Updated"),
 *      @SWG\Property(property="status", type="string", example="success")
 * ),
 * @SWG\Definition(
 *      definition="EmailNotExist",
 *      type="object",
 *      description="Cash drawer not found",
 *      @SWG\Property(property="message", type="string", example="Internal server error"),
 *      @SWG\Property(property="status", type="string", example="error")
 * ),
 * @SWG\Definition(
 *      definition="Authenticated",
 *      type="object",
 *      description="Supervisor authenticated",
 *      @SWG\Property(property="message", type="string", example="Authenticated"),
 *      @SWG\Property(property="status", type="string", example="success")
 * ),
 * @SWG\Definition(
 *      definition="AuthenticationFailed",
 *      type="object",
 *      description="Supervisor authentication failed",
 *      @SWG\Property(property="message", type="string", example="AuthenticationFailed"),
 *      @SWG\Property(property="status", type="string", example="error")
 * ),
 * @SWG\Definition(
 *      definition="CreateStoreParam",
 *      type="object",
 *      description="Parameter for creating store",
 *      @SWG\Property(property="store_name", type="string", example="Bigbaazar"),
 *      @SWG\Property(property="address", type="string", example="indrapuram"),
 *      @SWG\Property(
 *          property="employee",
 *          type="array", 
 *          @SWG\Items(
 *              type="integer",
 *              default ="1"
 *          )
 *      )
 * ),
 * @SWG\Definition(
 *      definition="StoreCreated",
 *      type="object",
 *      description="Response parameter of store creation",
 *      @SWG\Property(property="message", type="string", example="StoreCreated"),
 *      @SWG\Property(property="status", type="string", example="success")
 * ),
 * @SWG\Definition(
 *      definition="StoreUpdated",
 *      type="object",
 *      description="Response parameter of store updation",
 *      @SWG\Property(property="message", type="string", example="StoreUpdated"),
 *      @SWG\Property(property="status", type="string", example="success")
 * ),
 * @SWG\Definition(
 *      definition="StoreDeleted",
 *      type="object",
 *      description="Response parameter of store deletion",
 *      @SWG\Property(property="message", type="string", example="StoreDeleted"),
 *      @SWG\Property(property="status", type="string", example="success")
 * ),
 * @SWG\Definition(
 *      definition="StoreAssigned",
 *      type="object",
 *      description="Response parameter of device assignment to store",
 *      @SWG\Property(property="message", type="string", example="StoreAssigned"),
 *      @SWG\Property(property="status", type="string", example="success")
 * ),
 * @SWG\Definition(
 *      definition="CreateLoyaltyProgram",
 *      type="object",
 *      description="Parameter for creating loyalty program",
 *      @SWG\Property(property="program_code", type="string", example="lol1234"),
 *      @SWG\Property(property="program_name", type="string", example="Silver Plan"),
 *      @SWG\Property(property="description", type="string", example="description"),
 *      @SWG\Property(property="no_validity", type="string", example="true/false"),
 *      @SWG\Property(property="validity_start", type="string",format="date-time", pattern = "\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}", description="pass when no_validity is false"),
 *      @SWG\Property(property="validity_end", type="string",format="date-time", pattern = "\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}", description="pass when no_validity is false"),
 *      @SWG\Property(property="set_point", type="integer", example=10),
 *      @SWG\Property(property="amount_spend", type="integer", example=100),
 *      @SWG\Property(property="min_redemption_point", type="integer", example=100),
 *      @SWG\Property(property="max_redemption_point", type="integer", example=1000),
 *      @SWG\Property(property="registration_point", type="integer", example=100)
 * ),
 * @SWG\Definition(
 *      definition="UpdateLoyaltyProgram",
 *      type="object",
 *      description="Parameter for updating loyalty program",
 *      @SWG\Property(property="program_name", type="string", example="Silver Plan"),
 *      @SWG\Property(property="description", type="string", example="description"),
 *      @SWG\Property(property="no_validity", type="string", example="true/false"),
 *      @SWG\Property(property="validity_start", type="string",format="date-time", pattern = "\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}", description="pass when no_validity is false"),
 *      @SWG\Property(property="validity_end", type="string",format="date-time", pattern = "\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}", description="pass when no_validity is false"),
 *      @SWG\Property(property="set_point", type="integer", example=10),
 *      @SWG\Property(property="amount_spend", type="integer", example=100),
 *      @SWG\Property(property="min_redemption_point", type="integer", example=100),
 *      @SWG\Property(property="max_redemption_point", type="integer", example=1000),
 *      @SWG\Property(property="registration_point", type="integer", example=100),
 *      @SWG\Property(property="status", type="string", example="0/1")
 * ),
 * @SWG\Definition(
 *      definition="SaveSalesData",
 *      type="object",
 *      description="Parameter for saving sales data",
 *      required={"mobile_number","store_id","sales_staff_id",
 *               "subtotal","total_bill","transaction_no",
 *               "currency","status","type","doc_no","deviceuid","date","items","payments"
 *      },
 *      @SWG\Property(property="mobile_number", type="string", example="9599402563"),
 *      @SWG\Property(property="store_id", type="integer", example=1),
 *      @SWG\Property(property="sales_staff_id", type="integer", example=121),
 *      @SWG\Property(property="subtotal", type="string", example="5000"),
 *      @SWG\Property(property="additional_discount", type="string", example="50"),
 *      @SWG\Property(property="total_bill", type="string", example="4850"),
 *      @SWG\Property(property="applied_coupon", type="string", example="100OFF"),
 *      @SWG\Property(property="coupon_amount", type="string", example="100"),      
 *      @SWG\Property(property="transaction_no", type="string", example="txn1000"),
 *      @SWG\Property(property="loyalty_card_no", type="string", example="9098303155"),
 *      @SWG\Property(property="currency", type="string", example="$"),
 *      @SWG\Property(property="status", type="string", example="APPROVED/REJECTED/DELETED/PENDING/CANCELED"),
 *      @SWG\Property(property="type", type="string", example="RETAIL"),
 *      @SWG\Property(property="doc_no", type="string", example ="AE/SALES/12/2018/00739"),
 *      @SWG\Property(property="deviceuid", type="string", example ="uid1234"),
 *      @SWG\Property(property="date", type="string",format="date-time", pattern = "\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}", description="date of transaction"),
 *      @SWG\Property(property="used_for", type="string",example="CUSTOMER/NA"),
 *      @SWG\Property(
 *          property="items",
 *          type="array",
 *          @SWG\Items(
 *              required={"item_id","quantity","unit_price","tax","total","warehouse_id","calculation"},
 *              @SWG\Property(property="item_id", type="integer", example=109),
 *              @SWG\Property(property="sales_ledger", type="integer", example=44),
 *              @SWG\Property(property="quantity", type="integer", example=1),
 *              @SWG\Property(property="unit_price", type="integer", example=1000),
 *              @SWG\Property(property="promotion_id", type="integer", example=1),
 *              @SWG\Property(property="promotion_price", type="integer", example=500),
 *              @SWG\Property(property="promotion_discount", type="integer", example=0),
 *              @SWG\Property(property="manual_discount", type="integer", example=0),
 *              @SWG\Property(
 *                  property="tax",
 *                  type="array",
 *                  @SWG\Items(
 *                      required={"tax_id","tax_amount"},
 *                      @SWG\Property(property="tax_id", type="integer", example=1),
 *                      @SWG\Property(property="tax_amount", type="integer", example=100),
 *                  )
 *              ),
 *              @SWG\Property(property="total", type="integer", example=1005),
 *              @SWG\Property(property="bill_no", type="string", example="AE/SALES/11/2018/00739"),
 *              @SWG\Property(property="warehouse_id", type="integer", example=1),
 *              @SWG\Property(property="calculation", type="string", example="SUB"),
 *          )
 *      ),
 *      @SWG\Property(
 *          property="payments",
 *          type="array",
 *          @SWG\Items(
 *              required={"payment_mode_code","amount"},
 *              @SWG\Property(property="payment_mode_code", type="string", example="ch", description="ch=Cash, crd=Card, crn=Credit Note lc=Loyalty Card"),
 *              @SWG\Property(property="card_no", type="string", example="9098303155", description="required if payment_mode_code=crn,lc"),
 *              @SWG\Property(property="amount", type="integer", example=1005),
 *              @SWG\Property(property="redeemed_point", type="integer", example=150, description="required if payment_mode_code=lc")
 *          )
 *      )
 * ),
 * @SWG\Definition(
 *      definition="AssignCouponBookData",
 *      type="object",
 *      description="Parameter for assigning coupon book to sales person",
 *      @SWG\Property(property="booklet_no", type="string", example="123"),
 *      @SWG\Property(property="coupon_count", type="integer", example=100),
 *      @SWG\Property(property="coupon_from", type="integer", example=1),
 *      @SWG\Property(property="coupon_to", type="integer", example=100),
 *      @SWG\Property(property="assigned_to", type="integer", example=121),
 *      @SWG\Property(property="company_id", type="integer", example=6)
 * ),
 * @SWG\Definition(
 *      definition="SaveCouponInfoData",
 *      type="object",
 *      description="Parameter for assigning coupon book to sales person",
 *      @SWG\Property(
 *          property="coupons",
 *          type="array",
 *          @SWG\Items(
 *              @SWG\Property(property="coupon_code", type="string", example="123456"),
 *              @SWG\Property(property="valid_till", type="string",format="date-time", pattern = "\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}", description="validity of coupon"),
 *              @SWG\Property(property="issued_by", type="integer", example=121),
 *              @SWG\Property(property="company_id", type="integer", example=6),
 *              @SWG\Property(property="type", type="string", example="preprinted/generated"),
 *              @SWG\Property(property="booklet_no", type="string", example="123"),
 *              @SWG\Property(property="status", type="status", example="not_assigend/assigned/redeemed")
 *          )
 *      )
 * ),
 * @SWG\Definition(
 *      definition="CreatePromotion",
 *      type="object",
 *      description="Promotion data object",
 *      required={"promotion_code", "promotion_name", "type", "amount", "qty" ,"effective_date" , "end_date","entities"},
 *      @SWG\Property(property="promotion_code", type="string", example="pro101"),
 *      @SWG\Property(property="promotion_name", type="string", example="buy1get1free"),
 *      @SWG\Property(property="category", type="string", example="percent/fixed/buy-x-get-y"),
 *      @SWG\Property(property="amount", type="integer", example=2),
 *      @SWG\Property(property="qty", type="integer", example=1),
 *      @SWG\Property(property="effective_date", type="string",format="date", pattern = "\d{4}-\d{2}-\d{2}"),
 *      @SWG\Property(property="end_date", type="string",format="date", pattern = "\d{4}-\d{2}-\d{2}"),
 *      @SWG\Property(
 *          property="entities",
 *          type="object",
 *          @SWG\Property(property="entity_type", type="string", example="item"),
 *          @SWG\Property(
 *                  property="entity_items",
 *                  type="array",
 *                  @SWG\Items(
 *                  )
 *          )        
 *      ),
 *      @SWG\Property(
 *                  property="promotional_entity",
 *                  type="array",
 *                  @SWG\Items(
 *                  )
 *      )
 * ),
 * @SWG\Definition(
 *      definition="UpdatePromotion",
 *      type="object",
 *      description="Promotion data object",
 *      required={"promotion_name", "type", "amount", "qty" ,"effective_date" , "end_date","entities"},
 *      @SWG\Property(property="promotion_name", type="string", example="buy1get1free"),
 *      @SWG\Property(property="category", type="string", example="percent/fixed/buy-x-get-y"),
 *      @SWG\Property(property="amount", type="integer", example=2),
 *      @SWG\Property(property="qty", type="integer", example=1),
 *      @SWG\Property(property="effective_date", type="string",format="date", pattern = "\d{4}-\d{2}-\d{2}"),
 *      @SWG\Property(property="end_date", type="string",format="date", pattern = "\d{4}-\d{2}-\d{2}"),
 *      @SWG\Property(
 *          property="entities",
 *          type="object",
 *          @SWG\Property(property="entity_type", type="string", example="item"),
 *          @SWG\Property(
 *                  property="entity_items",
 *                  type="array",
 *                  @SWG\Items(
 *                  )
 *          )        
 *      ),
 *      @SWG\Property(
 *                  property="promotional_entity",
 *                  type="array",
 *                  @SWG\Items(
 *                  )
 *      )
 * ),
 * @SWG\Definition(
 *      definition="CheckPromotion",
 *      type="object",
 *      description="item array for checking the promotion",
 *      required={"items"},
 *      @SWG\Property(
 *          property="items",
 *          type="array",
 *          @SWG\Items(
 *          )
 *      )
 * ),
 * @SWG\Definition(
 *      definition="SaveTaxRule",
 *      type="object",
 *      description="Tax rule data",
 *      required={"tax_rule"},
 *      @SWG\Property(
 *          property="tax_rule",
 *          type="array",
 *          @SWG\Items(
 *              @SWG\Property(property="tax_title", type="string", example="Country Title"),
 *              @SWG\Property(property="country_id", type="integer", example=1),
 *		@SWG\Property(property="state_id", type="integer", example=1),
 *              @SWG\Property(property="zip_postal_code", type="integer", example=110091),
 *		@SWG\Property(property="rate_percentage", type="float", example=10.5),
 *              @SWG\Property(property="is_default", type="boolean", example=true)
 *          )
 *      )
 * ),
 * @SWG\Definition(
 *      definition="UpdateTaxRule",
 *      type="object",
 *      description="Tax rule data",
 *      @SWG\Property(property="tax_title", type="string", example="Country Title"),
 *      @SWG\Property(property="country_id", type="integer", example=1),
 *	@SWG\Property(property="state_id", type="integer", example=1),
 *      @SWG\Property(property="zip_postal_code", type="integer", example=110091),
 *	@SWG\Property(property="rate_percentage", type="float", example=10.5),
 *      @SWG\Property(property="is_default", type="boolean", example=true)
 * ), 
* @SWG\Definition(
 *      definition="TaxDeleted",
 *      type="object",
 *      description="Response parameter of tax deletion",
 *      @SWG\Property(property="message", type="string", example="TaxDeleted"),
 *      @SWG\Property(property="status", type="string", example="success")
 * ),
* @SWG\Definition(
*      definition="SaveProcurement",
*      type="object",
*      description="Save Procurement",
*      required={"delivery_date","created_by"},
*            @SWG\Property(property="memo", type="string", example="test"),
*            @SWG\Property(property="supplier_id", type="integer", example=1),                
*            @SWG\Property(property="delivery_date", type="date", example="2018-12-07"),
*      @SWG\Property(property="created_by", type="integer", example=1),
*      @SWG\Property(property="last_updated_by", type="integer", example=1),
*      @SWG\Property(property="amend_no", type="string", example="Test"),
*      @SWG\Property(property="tax_for_taxable_expenses", type="float", example=10.5),
*      @SWG\Property(property="ref_id", type="integer", example=1),
*      @SWG\Property(
*          property="items",
*          type="array",
*          @SWG\Items(
*      required={"item_id","quantity"},
*              @SWG\Property(property="item_id", type="integer", example=101),
*              @SWG\Property(property="description", type="string", example="Description of item"),
*              @SWG\Property(property="price", type="float", example=10.5),
*              @SWG\Property(property="quantity", type="float", example=10.00),
*              @SWG\Property(property="warehouse_id", type="integer", example=40),
*              @SWG\Property(property="project_id", type="integer", example=20),
*              @SWG\Property(property="tax", type="float", example=2.5),
*              @SWG\Property(property="discount", type="float", example=25.9),
*              @SWG\Property(property="line_item_total", type="double", example=9087.94)
*          )
*      )    
 * ),
 * @SWG\Definition(
 *      definition="CreateDiscount",
 *      type="object",
 *      description="Create discount limit data",
 *      required={"emp_discout_limit"},
 *      @SWG\Property(
 *          property="emp_discout_limit",
 *          type="array",
 *          @SWG\Items(
 *              required={"employee_id","limit"},
 *              @SWG\Property(property="employee_id", type="integer", example=1),
 *              @SWG\Property(property="limit", type="integer", example=100)
 *          )
 *      )    
 * ),
 * @SWG\Definition(
 *      definition="UpdateDiscount",
 *      type="object",
 *      description="Update discount limit",
 *      required={"limit"},
 *      @SWG\Property(property="limit", type="integer", example=100) 
 * ),
 *  * @SWG\Definition(
 *      definition="ItemReturn",
 *      type="object",
 *      description="Item Return",
 *      required={"items", "sale_id"},
 *      @SWG\Property(property="sale_id", type="integer", example=1),
 *      @SWG\Property(
 *          property="items",
 *          type="array",
 *          @SWG\Items(
 *              @SWG\Property(property="item_id", type="integer", example=1),
 *              @SWG\Property(property="quantity", type="integer", example=5)
 *          )
 *      )
 * ),
 **/
