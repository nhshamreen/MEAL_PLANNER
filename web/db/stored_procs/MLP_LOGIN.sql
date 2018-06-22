DROP PROCEDURE  `MLP_LOGIN` ;
DELIMITER //
CREATE DEFINER =  `myspac17`@`localhost` PROCEDURE  `MLP_LOGIN` 
(
    IN  IN_EMAIL VARCHAR(50),
    IN  IN_PWD VARCHAR(50),
    OUT OUT_RTN_CD INT,
    OUT OUT_RTN_MSG  VARCHAR(100),
    OUT OUT_RTN_ROWS INT
 
 
 )
 NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER
BEGIN 
  DECLARE USR_ID  INT;
  DECLARE EXIT HANDLER FOR SQLEXCEPTION
  BEGIN
    GET DIAGNOSTICS CONDITION 1
    @p1 = RETURNED_SQLSTATE, @p2 = MESSAGE_TEXT;
    
      SET OUT_RTN_CD= @p1;
      SET OUT_RTN_ROWS=0;
      SET OUT_RTN_MSG= @p2;
  END ;

    
    SELECT COUNT(*),ID INTO OUT_RTN_ROWS , USR_ID FROM USR
    WHERE EMAIL=IN_EMAIL AND PWDHASH=MD5(IN_PWD);


    IF OUT_RTN_ROWS=1 
    THEN
      SET OUT_RTN_CD= 0;
      SET OUT_RTN_ROWS=USR_ID;
      SET OUT_RTN_MSG= "Login successful";
    ELSE
      SET OUT_RTN_CD= -1;
      SET OUT_RTN_MSG= "Invalid Credentials! Please try again";
     END IF ;
  
END ;
//
DELIMITER;

