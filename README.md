# Promotion Module 

Promotion and Promotion Group module for Magento 2

## Installation

### Type 1: Zip file

- Download code from repository https://github.com/andrewprofile/module-promotion by zip
- Unzip the zip files in `app/code/Andrewprofile/Promotion`
- Enable the module by running `php bin/magento module:enable Andrewprofile_Promotion`
- Apply database updates by running `php bin/magento setup:upgrade` _(1)_
- Flush the cache by running `php bin/magento cache:flush`

### Type 2: Composer

- Add the vcs repository to the configuration by running `composer config repositories.module-promotion vcs https://github.com/andrewprofile/module-promotion.git`
- Install the module composer by running `composer require andrewprofile/module-promotion`
- Enable the module by running `php bin/magento module:enable Andrewprofile_Promotion`
- Apply database updates by running `php bin/magento setup:upgrade` _(1)_
- Flush the cache by running `php bin/magento cache:flush`

_(1)_ in production please use with the `--keep-generated`

## Configuration

Generate integration access token with ACL permissions.

## Sample Usage

- Enable Swagger
- Call CRUD actions for Api Group:
  - andrewprofilePromotionPromotionRepositoryV1
  - andrewprofilePromotionPromotionGroupRepositoryV1
  - andrewprofilePromotionPromotionGroupPromotionRepositoryV1 
