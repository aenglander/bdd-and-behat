Feature: Website is accessible
  As a web user
  In order to use the website
  It must be accessible

  Scenario: It has a title when browsed
    When I go to the homepage
    Then the page title should contain "Food Delivery"