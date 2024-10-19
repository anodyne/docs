---
title: Applications
description: Control the content users post into stories.
layout: docs
section: Features
---

## Join form

### Rate limiting

To combat bad actors and potential spam attacks, Nova includes 2 rate limiters on the endpoint that processes a join application. If either one of these rate limits are hit, users will be presented with a 429 Too Many Requests error.

The first rate limiter will begin blocking traffic after 15 requests in a minute from the same IP address. Since this rate limiter happens before the request is validated, this has a small chance to impact a legitimate user who is trying to submit an application but gets validation errors each time they click the submit button. After the 15 minutes have elapsed, the IP address will be able to attempt to submit the join form.

The second rate limiter will block any request from the same email address for 15 minutes after a successful application submission. After the 15 minutes have elapsed, the user will be able to submit another application.

## Reviewers
