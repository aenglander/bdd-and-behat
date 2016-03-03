Feature: Restaurants are searchable
  As a web user
  In order to find restaurants
  I can search the site and find them

  Background:
    Given I am on the site

  Scenario: Searching returns listings
    When I fill in "Enter Your Address" with "6795 S Edmond St, Las Vegas, NV 89118"
    And I press "Find Restaurants"
    Then I should see "Payless Pizza"
    Then I should see "Veggie House"
