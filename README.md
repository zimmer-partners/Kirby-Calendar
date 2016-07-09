# Kirby-Calendar

Kirby Plugin to expose Calendar Data as HTML overview and as ICS subscription.

# Installation

## Manual Setup

1. Download the Git repository as a Zip.
2. Unpack the Zip and move contents of resulting directory to `site/plugins/calendar`.

## Git Setup

1. Open a shell at the root of your Kirby or Kirby Starterkit installation.
2. Run `git submodule add -b master --name calendar git@github.com:moritzz/Kirby-Calendar.git site/plugins/calendar`

## Creating a Calendar and Events

1. Open Kirby Panel.
2. Create a Calendar page.
3. Fill out the Calendar page form and configure it to your need.
4. Add Event pages as children to the Calendar page.
5. Add one or more event to your Event pages.

To run multiple calendars on one site too, just create multiple Calendar pages with corresponding Event child pages.

**Nota bene:** By default a Calendar page does render a standard webpage with a link to the same feed as ICS that users can subscribe to with Apple or Google Calendar or most other calendar apps. The summary and subscription updates to data from a calendar page's *siblings and child pages* with events attached. Therefore it's possible to add such a structure field to any existing page type. My [Blog plugin](https://github.com/moritzz/Kirby-Blog) already supports calendar integration. Please refer to its [Read Me file](https://github.com/moritzz/Kirby-Blog/blob/master/README.md) on how to add a calendar stream with all events attached to your Blog.

# Version History #

- v1.0: First official release
- v1.0.1: Fixed typo in Read Me
- v1.1: Scheme aware calendar overview
  - Added support to list all events as webpage
  - Added a dedicated option to subscribe to all current an future events as ICS
  - Removed Kirby `date.handler` setting dependency 

# Planned Additions

- Better method and instructions for visitors with no Calendar App installed (e.g. Google Calendar users with no App installed).