---
title: Telemetry
description: Learn about the information that Anodyne collects from your game.
layout: docs
section: Resources
---

Beginning with the release of Nova 2.7.3, Anodyne began collecting information from Nova games to help with support requests and tracking general usage.

## What is collected and when?

|Data                                 |Install|Update|Daily |
|-------------------------------------|-------|------|------|
|Name of the game                     |{% checkmark %}|{% checkmark %}|      |
|URL of the site                      |X      |X     |      |
|Configured genre                     |X      |X     |      |
|Initial install date                 |X      |X     |      |
|Nova version                         |X      |X     |X     |
|PHP version                          |X      |X     |      |
|Configured database platform         |X      |X     |      |
|Database version                     |X      |X     |      |
|Server software                      |X      |X     |      |
|Number of active users               |X      |X     |X     |
|Number of active primary characters  |X      |X     |X     |
|Number of active secondary characters|X      |X     |X     |
|Number of active support characters  |X      |X     |X     |
|Number of stories                    |X      |X     |X     |
|Number of story groups               |X      |X     |X     |
|Number of published posts            |X      |X     |X     |
|Number of published words            |X      |X     |X     |
|Date of last published post          |       |      |X     |

{% note title="Server information" %}
Due to the sensitive nature of software versions running on the server, we do not collect those daily. Only a fresh install or system update triggers sending that information to Anodyne.
{% /note %}

### Fresh install and update syncs

During the install and update processes, Nova makes a `POST` request to the Anodyne servers with the full set of information listed above. This process can only be initiated during the install and update processes and that set of information cannot be independently retrieved.

### Daily heartbeats

Once a day, Anodyne reaches out to all active Nova games running Nova 2.7.10 or higher and polls for the latest content information indicated above by the Daily column. While the endpoint that Anodyne reaches out to is public, it only contains content-related information and no server or critical information is ever included.

## Why collect this data?

Collecting this information allows us to streamline the support process. For example, once we know the URL of your game, we're able to quickly see the versions of Nova, PHP, and MySQL that you're running. Sometimes that can provide some starting points for us to look at why an issue might be happening.

Beyond the information that we would collect for support purposes, the general usage of Nova across the world is something we've always been interested in understanding. Collecting counts of users, characters, stories, and posts gives us better insights into the global community that's using Nova.

{% note title="No personal data" %}
Anodyne does not, and will never, collect any personal data from your game such as users names or email addresses. The only thing we collect is counts of things and dates.
{% /note %}
