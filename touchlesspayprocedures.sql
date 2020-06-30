DELIMITER $$
CREATE OR REPLACE PROCEDURE BUSINESSTYPEINSERT(P_NAME VARCHAR(50),P_CREATEDAT DATETIME)
BEGIN
INSERT INTO `businesstype` ( `TypeName`) VALUES ( P_NAME,P_CREATEDAT);
END $$
DELIMITER ;


DELIMITER $$
CREATE OR REPLACE PROCEDURE BUSINESSTYPEUPDATE(P_ID INT,P_NAME VARCHAR(50))
BEGIN
UPDATE `businesstype` SET `TypeName` = P_NAME
						 ,`UpdatedAt` = SYSDATE()
WHERE TypeID = p_id;                        
END $$
DELIMITER ;

DELIMITER $$
CREATE OR REPLACE PROCEDURE BUSINESSTYPEDELETE(IN P_ID INT,IN P_NAME VARCHAR(50))
BEGIN
	IF P_ID > 0 THEN
		UPDATE `businesstype` 
        	SET `IsDeleted` = 1
			 ,`DeletedAt` = SYSDATE()
			WHERE TypeID = p_id;   
	ELSE
		UPDATE `businesstype` 
   			SET `IsDeleted` = 1
		 		,`DeletedAt` = SYSDATE()
		WHERE TypeNAME = P_NAME;  
	END IF;
END $$
DELIMITER ;

DELIMITER $$
CREATE OR REPLACE PROCEDURE BUSINESSINSERT(P_BusinessTypeID int(18) ,
   P_BusinessName varchar(50) ,
   P_BusinessAddressLine1  text ,
   P_BusinessAddressLine2  text  ,
   P_BusinessCity  varchar(50)  ,
   P_BusinessProvince  varchar(50)  ,
   P_BusinessCountry  varchar(50)  ,
   P_BusinessPostalCode  varchar(50)  ,
   P_BusinessPhone  varchar(50)  ,
   P_BusinessLogo  varchar(200)  ,
   P_BusinessRegNo  varchar(50)  ,
   P_TaxRegNo  varchar(50)  ,
   P_TaxPercent  varchar(50)  ,
   P_CreatedAt  datetime  ,
   P_CreatedBy  varchar(50)  )
BEGIN
INSERT INTO `business` (
      `BusinessID`   ,
  `BusinessTypeID`   ,
  `BusinessName`    ,
  `BusinessAddressLine1`   ,
  `BusinessAddressLine2`  ,
  `BusinessCity`    ,
  `BusinessProvince`    ,
  `BusinessCountry`    ,
  `BusinessPostalCode`    ,
  `BusinessPhone`    ,
  `BusinessLogo`  ,
  `BusinessRegNo`    ,
  `TaxRegNo`    ,
  `TaxPercent`    ,
  `CreatedAt`   ,
  `CreatedBy`  ) VALUES ( P_BusinessTypeID  ,
   P_BusinessName   ,
   P_BusinessAddressLine1  ,
   P_BusinessAddressLine2   ,
   P_BusinessCity     ,
   P_BusinessProvince     ,
   P_BusinessCountry     ,
   P_BusinessPostalCode     ,
   P_BusinessPhone     ,
   P_BusinessLogo  ,
   P_BusinessRegNo     ,
   P_TaxRegNo     ,
   P_TaxPercent     ,
   P_CreatedAt  ,
   P_CreatedBy     );
END $$
DELIMITER ;

DELIMITER $$
CREATE OR REPLACE PROCEDURE BUSINESSUPDATE(P_BusinessId int(18),
	P_BusinessTypeID int(18) ,
   P_BusinessName varchar(50) ,
   P_BusinessAddressLine1  text ,
   P_BusinessAddressLine2  text  ,
   P_BusinessCity  varchar(50)  ,
   P_BusinessProvince  varchar(50)  ,
   P_BusinessCountry  varchar(50)  ,
   P_BusinessPostalCode  varchar(50)  ,
   P_BusinessPhone  varchar(50)  ,
   P_BusinessLogo  varchar(200)  ,
   P_BusinessRegNo  varchar(50)  ,
   P_TaxRegNo  varchar(50)  ,
   P_TaxPercent  varchar(50)  ,
   P_UatedAt  datetime  ,
   P_UpdatedBy  varchar(50)  )
BEGIN
UPDATE `business` SET  `BusinessID`   = P_BusinessTypeID ,
  `BusinessTypeID`  = P_BusinessName ,
  `BusinessName`  =P_BusinessAddressLine1  ,
  `BusinessAddressLine1`  = P_BusinessAddressLine2 ,
  `BusinessAddressLine2` =P_BusinessCity  ,
  `BusinessCity`  = P_BusinessProvince  ,
  `BusinessProvince`  = P_BusinessProvince  ,
  `BusinessCountry` =  P_BusinessCountry    ,
  `BusinessPostalCode`  = P_BusinessPostalCode  ,
  `BusinessPhone` =  P_BusinessPhone   ,
  `BusinessLogo` =   P_BusinessLogo  ,
  `BusinessRegNo`  =  P_BusinessRegNo   ,
  `TaxRegNo`   =  P_TaxRegNo ,
  `TaxPercent`   =   P_TaxPercent ,
  `CreatedAt` =  P_UatedAt  ,
  `CreatedBy` =  P_UpdatedBy 
WHERE BusinessID = P_BusinessId;                        
END $$
DELIMITER ;

DELIMITER $$
CREATE OR REPLACE PROCEDURE BUSINESSDELETE(IN P_BusinessID INT,IN P_businessNAME VARCHAR(50))
BEGIN
	IF P_businessID > 0 THEN
		UPDATE `business` 
        	SET `IsDeleted` = 1
			 ,`DeletedAt` = SYSDATE()
			WHERE businessID = p_businessid;   
	ELSE
		UPDATE `business` 
   			SET `IsDeleted` = 1
		 		,`DeletedAt` = SYSDATE()
		WHERE businessNAME = P_businessNAME;  
	END IF;
END $$
DELIMITER ;

DELIMITER $$
CREATE OR REPLACE PROCEDURE usertypeINSERT(P_usertypename VARCHAR(50),P_CREATEDAT DATETIME)
BEGIN
INSERT INTO `usertype` ( `usertypename`) VALUES ( P_usertypename,P_CREATEDAT);
END $$
DELIMITER ;


DELIMITER $$
CREATE OR REPLACE PROCEDURE usertypeUPDATE(P_usertypeID INT,P_usertypename VARCHAR(50))
BEGIN
UPDATE `usertype` SET `usertypename` = P_usertypename
						 ,`UpdatedAt` = SYSDATE()
WHERE userTypeID = p_usertypeid;                        
END $$
DELIMITER ;

DELIMITER $$
CREATE OR REPLACE PROCEDURE usertypeDELETE(IN P_usertypeID INT,IN P_usertypename VARCHAR(50))
BEGIN
	IF P_usertypeID > 0 THEN
		UPDATE `usertype` 
        	SET `IsDeleted` = 1
			 ,`DeletedAt` = SYSDATE()
			WHERE userTypeID = p_usertypeid;   
	ELSE
		UPDATE `usertype` 
   			SET `IsDeleted` = 1
		 		,`DeletedAt` = SYSDATE()
		WHERE usertypename = P_usertypename;  
	END IF;
END $$
DELIMITER ;

DELIMITER $$
CREATE OR REPLACE PROCEDURE LOGININSERT( p_loginId  int(50)  ,
  p_UserTypeID  int(50)  ,
  p_UserID  int(50)  ,
  p_UserName  varchar(50)  ,
  p_Password  varchar(50)  ,
  p_CreatedAt  datetime    ,
  p_CreatedBy  varchar(50))
BEGIN
INSERT INTO `login` (  `loginId`    ,
  `UserTypeID`    ,
  `UserID`    ,
  `UserName`    ,
  `Password`    ,
  `CreatedAt`      ,
  `CreatedBy`    
) VALUES (   p_loginId     ,
  p_UserTypeID     ,
  p_UserID     ,
  p_UserName     ,
  p_Password     ,
  p_CreatedAt       ,
  p_CreatedBy     
);
END $$
DELIMITER ;

DELIMITER $$
CREATE OR REPLACE PROCEDURE LOGINUPDATE( p_loginId  int(50)  ,
  p_UserTypeID  int(50)  ,
  p_UserID  int(50)  ,
  p_UserName  varchar(50)  ,
  p_Password  varchar(50) ,
  p_UpdatedAt  datetime  ,
  p_UpdateBy  varchar(50)    )
BEGIN
UPDATE `login`  
SET     `UserTypeID` = p_UserTypeID   ,
  `UserID`  = p_UserID  ,
  `UserName` = p_UserName    ,
  `Password`  = p_Password  ,
  `UpdatedAt`   =  p_UpdatedAt     ,
  `UpdateBy`  =  p_UpdateBy 
WHERE `loginId` = p_loginId ;                        
END $$
DELIMITER ;

DELIMITER $$
CREATE OR REPLACE PROCEDURE LOGINDELETE(IN p_loginId  int(50))
BEGIN
	
		UPDATE `login` 
        	SET `IsDeleted` = 1
			 ,`DeletedAt` = SYSDATE()
			WHERE LOGINID = p_loginId  ;   
	
END $$
DELIMITER ;

DELIMITER $$
CREATE OR REPLACE PROCEDURE invoiceINSERT(P_CustomerID 	int(50) ,
P_BusinessID 	int(50) ,
P_InvoiceNumber 	int(50),
P_InvoiceDate 	date ,
P_PaymentID 	int(50), 
P_CreatedAt 	datetime, 
P_CreatedBy 	varchar(50) )
BEGIN
INSERT INTO `INVOICE` ( CustomerID,
BusinessID ,	
InvoiceNumber,
InvoiceDate ,
PaymentID ,
CreatedAt ,
CreatedBy ) VALUES ( P_CustomerID  ,
P_BusinessID  ,
P_InvoiceNumber ,
P_InvoiceDate ,
P_PaymentID , 
P_CreatedAt , 
P_CreatedBy );
END $$
DELIMITER ;


DELIMITER $$
CREATE OR REPLACE PROCEDURE INVOICEUPDATE(P_INVOICEID INT(11),
P_CustomerID 	int(50) ,
P_BusinessID 	int(50) ,
P_InvoiceNumber 	int(50),
P_InvoiceDate 	date ,
P_PaymentID 	int(50), 
P_UpdatedAt 	datetime 	,
P_UpdatedBy 	varchar(50) )
BEGIN
UPDATE `INVOICE` SET 
CustomerID = P_CustomerID ,
BusinessID  = P_BusinessID ,	
InvoiceNumber = P_InvoiceNumber,
InvoiceDate = P_InvoiceDate,
PaymentID  = P_PaymentID,
UpdatedAt = P_UpdatedAt,
UpdatedBy = P_UpdatedBy
WHERE INVOICEID = p_INVOICEid;                        
END $$
DELIMITER ;

DELIMITER $$
CREATE OR REPLACE PROCEDURE INVOICEDELETE(IN P_INVOICEID INT)
BEGIN
	
		UPDATE `INVOICE` 
        	SET `IsDeleted` = 1
			 ,`DeletedAt` = SYSDATE()
			WHERE INVOICEID = p_INVOICEid;   
	
END $$
DELIMITER ;


DELIMITER $$
CREATE OR REPLACE PROCEDURE customerINSERT(P_CustomerName 	varchar(200),
P_CustomerEmailID 	varchar(200), 
P_CustomerPhone 	varchar(50) ,
P_CreatedAt 	datetime 	,
P_CreatedBy 	varchar(100))
BEGIN
INSERT INTO CUSTOMER
(CustomerName ,
CustomerEmailID,  
CustomerPhone,
CreatedAt ,
CreatedBy)
VALUES
(P_CustomerName ,
P_CustomerEmailID, 
P_CustomerPhone 	 ,
P_CreatedAt 		,
P_CreatedBy 	);
END $$
DELIMITER ;



DELIMITER $$
CREATE OR REPLACE PROCEDURE customerUPDATE(P_CustomerId 	int(50) ,
P_CustomerName 	varchar(200),
P_CustomerEmailID 	varchar(200), 
P_CustomerPhone 	varchar(50) ,
P_UpdatedAt 	datetime ,
P_UpdatedBy 	varchar(100)) 	
BEGIN
UPDATE CUSTOMER 
SET CustomerName = P_CustomerName ,
CustomerEmailID = P_CustomerEmailID,  
CustomerPhone =  P_CustomerPhone ,
UpdatedAt 	= P_UpdatedAt,
UpdatedBy 	= P_UpdatedBy 
WHERE CUSTOMER_ID = P_CustomerId ;
END $$
DELIMITER ;

DELIMITER $$
CREATE OR REPLACE PROCEDURE customerDELETE(P_CustomerId 	int(50) ,
P_DeletedAt 	datetime 	,
P_DeletedBy 	varchar(100)
 )
BEGIN
UPDATE CUSTOMER 
SET DeletedAt = P_DeletedAt ,
DeletedBy  = P_DeletedBy ,
IsDeleted = 1
WHERE CUSTOMER_ID = P_CustomerId ;
END $$
DELIMITER ;




DELIMITER $$
CREATE OR REPLACE PROCEDURE paymentmethodINSERT(P_CustomerId 	int(50),
P_PayProfileID	varchar(100), 
P_CreatedAt 	datetime 	,
P_CreatedBy 	varchar(100))
BEGIN
INSERT INTO `paymentmethod` ( `CustomerID`, `PayProfileID`, `CreatedAt`,`CreatedBy`)
 VALUES ( p_CustomerID, p_PayProfileID, p_CreatedAt,p_CreatedBy);
END $$
DELIMITER ;


DELIMITER $$
CREATE OR REPLACE PROCEDURE paymentmethodUpdate(p_PaymentMethodId int(50)
,P_CustomerId 	int(50)
,P_PayProfileID	varchar(100)
,p_updatedAt datetime
,p_UpdateBy	varchar(100))
BEGIN
UPDATE `paymentmethod` 
SET `CustomerID`=  p_CustomerID
,`PayProfileID`= p_PayProfileID
,`UpdateddAt`= p_UpdatedAt
,`Updatedby`= p_UpdateBy
WHERE paymentmethod_id = p_PaymentMethodId;
END $$
DELIMITER ;

DELIMITER $$
CREATE OR REPLACE PROCEDURE paymentmethodDELETE((p_PaymentMethodId int(50),
,p_DELETEDAt datetime
,p_DELETEDBy	varchar(100)
 )
BEGIN
UPDATE `paymentmethod` 
SET `DELETEDAt`= p_DELETEDAt
,`DELETEDby`= p_DELETEDBy
,IsDeleted = 1
WHERE paymentmethod_id = p_PaymentMethodId;
END $$
DELIMITER ;





DELIMITER $$
CREATE OR REPLACE PROCEDURE INVOICEITEMINSERT(P_ProductID int(50) 
,p_Quantity int(50) 
,P_Amount float(10,2)
,P_CREATEDAT DATETIME)
BEGIN
INSERT INTO `invoiceitem` ( `ProductID`
		,Quantity
		,Amount
		,CreatedAt)
	VALUES ( P_product_id
			,P_Quantity
			,P_Amount
			,P_CREATEDAT);
END $$
DELIMITER ;


DELIMITER $$
CREATE OR REPLACE PROCEDURE INVOICEITEMUPDATE(p_InvoiceItemID INT(50)
,p_ProductID int(50)
,p_Quantity int(50)
,p_amount float(10,2)
,p_updatedat datetime)
BEGIN
UPDATE `invoiceitem` SET `ProductID` = p_ProductID
						 ,`Quantity` = p_Quantity
						 ,Amount = p_amount
						 ,UpdatedAt = p_updatedat
WHERE InvoiceItemID = p_InvoiceItemID;                        
END $$
DELIMITER ;

DELIMITER $$
CREATE OR REPLACE PROCEDURE INVOICEITEMDELETE(IN P_INVOICEITEMID INT,
P_DeletedAt 	datetime 	,
P_DeletedBy 	varchar(100))
BEGIN

		UPDATE `invoiceitem`
        	SET DeletedAt = P_DeletedAt ,
				DeletedBy  = P_DeletedBy ,
				IsDeleted = 1
			WHERE INVOICEITEMID = p_INVOICEITEMid;   
	
END $$
DELIMITER ;


DELIMITER $$
CREATE OR REPLACE PROCEDURE PRODUCTINSERT(
							P_BusinessID 		int(50) 		
							,P_ProductName 		varchar(200) 		
							,P_ProductAmount 	float(10,2) 
							,P_Taxable 			tinyint(1) 		
							,P_CreatedAt 		datetime 		
							,P_UpdatedAt 		datetime 		
							,P_IsDeleted 		tinyint(1) 	)
BEGIN
INSERT INTO `product` ( `BusinessID`
						,ProductName
						,ProductAmount
						,Taxable
						,CreatedAt)
	VALUES (P_BusinessID
			,P_ProductName 		
			,P_ProductAmount 
			,P_Taxable 	
			,P_CreatedAt 	
			,P_UpdatedAt 	
			,P_IsDeleted );
END $$
DELIMITER ;


DELIMITER $$
CREATE OR REPLACE PROCEDURE PRODUCTUPDATE(P_ProductID 		int(11) 	
,P_BusinessID 		int(50) 		
,P_ProductName 		varchar(200) 		
,P_ProductAmount 	float(10,2) 
,P_Taxable 			tinyint(1) 		
,P_UpdatedAt 		datetime )
BEGIN
	UPDATE `PRODUCT` 
	SET 	P_BusinessID  =	BusinessID
			,P_ProductName = ProductName
			,P_ProductAmount = ProductAmount
			,P_Taxable = Taxable
			,P_UpdatedAt = UpdatedAt
WHERE ProductID = p_ProductID;                        
END $$
DELIMITER ;


DELIMITER $$
CREATE OR REPLACE PROCEDURE PRODUCTDELETE(IN P_ProductID 		int(11) )
BEGIN

		UPDATE `PRODUCT`
        	SET IsDeleted = 1
			WHERE ProductID = P_ProductID;   
	
END $$
DELIMITER ;


DELIMITER $$
CREATE OR REPLACE PROCEDURE MERCHANTACCOUNTINSERT(
						P_BusinessID 	int(50) 
						,P_UserName 	varchar(50) 
						,P_Password 	varchar(50) 
						,P_Token 	varchar(50) 
						,P_CreatedAt 	datetime 
						,P_UpdatedAt 	datetime 
						,P_IsDeleted 	tinyint(1) 	
 	)
BEGIN
INSERT INTO `merchantaccount` ( BusinessID 
								,UserName
								,Password

								,Token 
								,CreatedAt
								)
						VALUES (P_BusinessID 
								,P_UserName
								,P_Password
								,P_Token 
								,P_CreatedAt );
END $$
DELIMITER ;

DELIMITER $$
CREATE OR REPLACE PROCEDURE MERCHANTACCOUNTUPDATE(	P_MerchantAccountID 	int(50) 
													,P_BusinessID 	int(50) 
													,P_UserName 	varchar(50) 
													,P_Password 	varchar(50) 
													,P_Token 	varchar(50) 
													,P_CreatedAt 	datetime 
													,P_UpdatedAt 	datetime 
													)
BEGIN
	UPDATE `merchantaccount` 
	SET 	BusinessID = P_BusinessID
			,UserName = P_UserName
			,Password = P_Password
			,Token = P_Token
			,UpdatedAt = P_UpdatedAt
WHERE MerchantAccountID = P_MerchantAccountID;                        
END $$
DELIMITER ;


DELIMITER $$
CREATE OR REPLACE PROCEDURE MERCHANTACCOUNTDELETE(IN P_MerchantAccountID 	int(50)  )
BEGIN

		UPDATE `merchantaccount`
        	SET IsDeleted = 1
			WHERE MerchantAccountID = P_MerchantAccountID;      
	
END $$
DELIMITER ;

DELIMITER $$
CREATE OR REPLACE PROCEDURE PAYMENTINSERT(P_payMethodID 	int(50) 
,P_MerchantAccountID 	int(50) 
,P_PaymentAmount 	float(10,2) 
,P_Settlement 	float(10,2) 
,P_CreatedAt 	datetime 
,P_UpdatedAt 	datetime 
,P_IsDeleted 	tinyint(1))
BEGIN
INSERT INTO `payment` ( MerchantAccountID
,PayMethodID 
,PaymentAmount
,Settlement
,CreatedAt
) VALUES ( P_payMethodID 
			,P_PaymentAmount
			,p_Settlement 
			,P_CreatedAt
			);
END $$
DELIMITER ;


DELIMITER $$
CREATE OR REPLACE PROCEDURE PAYMENTUPDATE(	P_PaymentID 	int(50) 
											,P_payMethodID 	int(50) 
											,P_MerchantAccountID 	int(50) 
											,P_PaymentAmount 	float(10,2) 
											,P_Settlement 	float(10,2)  
											,P_UpdatedAt 	datetime 
)
BEGIN
	UPDATE `payment` SET payMethodID = P_payMethodID
						,MerchantAccountID = P_MerchantAccountID
						,PaymentAmount = P_PaymentAmount
						,Settlement = p_Settlement
						,UpdatedAt = P_UpdatedAt
	WHERE PaymentID = P_PaymentID;                      
END $$
DELIMITER ;

DELIMITER $$
CREATE OR REPLACE PROCEDURE PAYMENTDELETE(IN P_PaymentID 	int(50) ,P_UpdatedAt 	datetime )
BEGIN
	
		UPDATE `payment` 
        	SET `IsDeleted` = 1
			 ,`DeletedAt` = P_UpdatedAt
			WHERE PaymentID = P_PaymentID;   
	
END $$
DELIMITER ;

