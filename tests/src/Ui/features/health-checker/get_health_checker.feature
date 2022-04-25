Feature: [GET] /api/health-checker
  I want to check the health checker entry point for some scenarios

  Scenario: Check health checker entry point
    Given I send a GET request to "/api/health-checker"
    Then the response content should be:
    """
    {
      "status": "ok"
    }
    """
    And the response status code should be 200

  Scenario: Check health checker entry point with error response
    Given I send a GET request to "/api/health-checker/error"
    Then the response content should be:
    """
    {
      "code": 404,
      "message": "ko"
    }
    """
    And the response status code should be 404

  Scenario: Check health checker entry point with validation errors response
    Given I send a GET request to "/api/health-checker/validation-errors"
    Then the response content should be:
    """
    {
      "code": 400,
      "errors": {
        "foo":"bar",
        "bar":"foo"
      }
    }
    """
    And the response status code should be 400
