Feature: ls-base
  Test base functionality of ls

  Scenario: See main page
    Given I am on homepage
     When I press "Войти"
     Then the response status code should be 200

  Scenario: See Colective Blog
    Given I am on "/blogs/"
    Then I should see "Gadgets"


  Scenario: See All Topic
    Given I am on "/index/newall/"
    Then I should see "iPad 3 rumored to come this March with quad-core chip and 4G LTE "
    Then I should see "Toshiba unveils 13.3-inch AT330 Android ICS 4.0 tablet"

  Scenario: See User Profile
    Given I am on "/profile/Golfer/"
    Then I should see "Sergey Doryba"
    Then I should see "... описания профиля Сергея Дорыбы"

    Given I am on "/profile/stfalcon/"
    Then I should see "Stepan Tanasiychuk"
    Then I should see "... описания профиля Stepan Tanasiychuk"