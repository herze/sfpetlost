CREATE OR REPLACE FUNCTION limite(fechaini date) RETURNS integer AS $$
DECLARE
fechafin TIMESTAMP;
fecha TIMESTAMP;
res integer;

BEGIN
  
  fechafin:=timestamp 'now()';
  fecha:=timestamp fechaini;
  res:=fechafin - fecha;
  RETURN res;
  
END;
$$ LANGUAGE plpgsql;


