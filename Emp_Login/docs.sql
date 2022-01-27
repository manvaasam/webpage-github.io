ALTER TABLE `employees`
    ADD COLUMN `about` TEXT NULL;
-- email
ALTER TABLE `employees`
    ADD COLUMN `email` VARCHAR(255) NULL;
-- phone
ALTER TABLE `employees`
    ADD COLUMN `phone` VARCHAR(255) NULL;