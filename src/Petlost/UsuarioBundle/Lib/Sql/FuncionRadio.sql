CREATE OR REPLACE FUNCTION radio(fechaini TIMESTAMP) RETURNS integer AS $$
DECLARE
fechafin date;
res integer;
radio integer;
BEGIN
  radio:=1000;
  fechafin:=timestamp 'now()';
  
  res:=fechafin - fechaini;
  IF res = 2 THEN
       radio:=1200; 
  ELSIF res > 2 THEN
       radio:=1400; 
  END IF;
  RETURN radio;
  
END;
$$ LANGUAGE plpgsql;
