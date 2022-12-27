delimiter $$
create procedure datosColmenaPromedios (IN idC INT)
begin
select id_colmena,
	avg(temperaturaIn1) as promedioTI1,
	avg(temperaturaIn2) as promedioTI2,
    avg(temperaturaEx1) as promedioTE,
    avg(humedadExt) as promedioHE,
    avg(humedadInt) as promedioHI
from datoscolmenas
where  id_colmena = idC;
end
$$

delimiter $$
create procedure datosColmenabyDate (IN idC INT, IN inicio datetime, IN fin datetime)
begin
select id_colmena,
	avg(temperaturaIn1) as promedioTI1,
	avg(temperaturaIn2) as promedioTI2,
    avg(temperaturaEx1) as promedioTE,
    avg(humedadExt) as promedioHE,
    avg(humedadInt) as promedioHI
from datoscolmenas
where  id_colmena = idC and fechaToma >= inicio and fechaToma <= fin;
end
$$

delimiter $$
create procedure datosDash (IN idE INT, IN inicio datetime, IN fin datetime)
begin
select datoscolmenas.id_colmena, colmenas.id_empresa,
	avg(temperaturaIn1) as promedioTI1,
	avg(temperaturaIn2) as promedioTI2,
    avg(temperaturaEx1) as promedioTE,
    avg(humedadExt) as promedioHE,
    avg(humedadInt) as promedioHI
from datoscolmenas
left join colmenas on colmenas.id_colmena = datoscolmenas.id_colmena
where  colmenas.id_empresa = idE and 
        fechaToma >= inicio and 
        fechaToma <= fin
group by datoscolmenas.id_colmena;
end
$$