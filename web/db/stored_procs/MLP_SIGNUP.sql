DROP PROCEDURE  `MLP_SIGNUP` ;
DELIMITER //
CREATE DEFINER =  `myspac17`@`localhost` PROCEDURE  `MLP_SIGNUP` 
(IN  IN_NAME VARCHAR(100),
 IN  IN_EMAIL VARCHAR(50),
 IN  IN_PWDHASH VARCHAR(50),
 OUT OUT_RTN_CD INT,
 OUT OUT_RTN_MSG  VARCHAR(100),
 OUT OUT_RTN_ROWS INT
 
 )
 NOT DETERMINISTIC CONTAINS SQL SQL SECURITY DEFINER
BEGIN 

  DECLARE EXIT HANDLER FOR SQLEXCEPTION
  BEGIN
    GET DIAGNOSTICS CONDITION 1
    @p1 = RETURNED_SQLSTATE, @p2 = MESSAGE_TEXT;
    
     SET OUT_RTN_CD= @p1;
     SET OUT_RTN_ROWS=0;
     SET OUT_RTN_MSG= @p2;
  END ;

    INSERT INTO USR (NAME,EMAIL,PWDHASH)
    VALUES(IN_NAME,IN_EMAIL,IN_PWDHASH);

    SET OUT_RTN_ROWS= ROW_COUNT();

    IF OUT_RTN_ROWS=1 
    THEN
      SET OUT_RTN_CD= 0;
      SET OUT_RTN_MSG= "Signup complete";
    ELSE
      SET OUT_RTN_CD= -1;
      SET OUT_RTN_MSG= "Error ocurred! Please try again";
     END IF ;
  
END ;
//
DELIMITER;