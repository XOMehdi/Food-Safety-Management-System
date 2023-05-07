CREATE DATABASE fsms;
USE fsms;

-- =============================================================================================================
--                                          DROP QUERIES
-- =============================================================================================================
DROP TABLE meal_chef;
DROP TABLE meal_ingredient;
DROP TABLE ingredient;
DROP TABLE supplier;
DROP TABLE chef;
DROP TABLE meal;


-- =============================================================================================================
--                                          CREATE QUERIES
-- =============================================================================================================
CREATE TABLE meal_chef (meal_id varchar(10) NOT NULL, chef_id varchar(10) NOT NULL, action_date timestamp NOT NULL, action_type varchar(50) NOT NULL, PRIMARY KEY (meal_id, chef_id, action_date));
CREATE TABLE meal_ingredient (meal_id varchar(10) NOT NULL, ingredient_id varchar(10) NOT NULL, date_added datetime NOT NULL, PRIMARY KEY (meal_id, ingredient_id));
CREATE TABLE ingredient (ingredient_id varchar(10) NOT NULL, ingredient_name varchar(50), ingredient_cost float, purchase_date date NOT NULL, expire_date date, allergy_type int(5), supplier int(5) NOT NULL, PRIMARY KEY (ingredient_id));
CREATE TABLE allergy (allergy_num int(5) NOT NULL AUTO_INCREMENT, allergy_type varchar(50) NOT NULL, allergy_severity int(2) NOT NULL, PRIMARY KEY (allergy_num));
CREATE TABLE supplier (supp_num int(5) NOT NULL AUTO_INCREMENT, supp_name varchar(50), supp_phone int(10), supp_country varchar(50), PRIMARY KEY (supp_num));
CREATE TABLE chef (chef_id varchar(10) NOT NULL, chef_fname varchar(50), chef_lname varchar(50), chef_age int(3), chef_gender char(1), PRIMARY KEY (chef_id));
CREATE TABLE meal (meal_id varchar(10) NOT NULL, meal_name varchar(50), meal_price int(11), meal_category varchar(50) NOT NULL, PRIMARY KEY (meal_id));


-- =============================================================================================================
--                                          INDEX/CONSTRAINT QUERIES
-- =============================================================================================================
ALTER TABLE meal_chef ADD INDEX FKmeal_chef260234 (chef_id), ADD CONSTRAINT FKmeal_chef260234 FOREIGN KEY (chef_id) REFERENCES chef (chef_id);
ALTER TABLE meal_chef ADD INDEX FKmeal_chef954388 (meal_id), ADD CONSTRAINT FKmeal_chef954388 FOREIGN KEY (meal_id) REFERENCES meal (meal_id);
ALTER TABLE ingredient ADD INDEX FKingredient51913 (allergy_type), ADD CONSTRAINT FKingredient51913 FOREIGN KEY (allergy_type) REFERENCES allergy (allergy_num);
ALTER TABLE meal_ingredient ADD INDEX FKmeal_ingre337039 (ingredient_id), ADD CONSTRAINT FKmeal_ingre337039 FOREIGN KEY (ingredient_id) REFERENCES ingredient (ingredient_id);
ALTER TABLE meal_ingredient ADD INDEX FKmeal_ingre215209 (meal_id), ADD CONSTRAINT FKmeal_ingre215209 FOREIGN KEY (meal_id) REFERENCES meal (meal_id);
ALTER TABLE ingredient ADD INDEX FKingredient740659 (supplier), ADD CONSTRAINT FKingredient740659 FOREIGN KEY (supplier) REFERENCES supplier (supp_num);

commit;
