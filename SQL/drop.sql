drop table RentalWebsite;
drop table WebUser;
drop table Customer;
drop table Rental_provider;
drop table RentalCategory;
drop table InsuranceCompany;
drop table Insurance;
drop table Rental;
drop table Contract;
drop table Includes;
drop table DurationOfRental;

drop sequence seq_webUser;
drop trigger trig_user_id;

drop procedure  p_delete_webuser;
drop procedure p_delete_customer;

drop view providerOwns;
drop view sumRented;
drop view income_with_repititions; 
drop view income; 