# Todist-CRM

Todist-CRM is a Customer Relationship Management (CRM) system built with Laravel and Laravel Filament.

## What is a CRM?

A Customer Relationship Management (CRM) system helps manage customer data. It supports sales management, delivers actionable insights, integrates with social media and facilitates team communication. Cloud-based CRM systems offer complete mobility and access to an ecosystem of bespoke apps.

This CRM, Todist-CRM, is designed to help you manage and analyze customer interactions and data throughout the customer lifecycle, with the goal of improving customer service relationships and assisting in customer retention and driving sales growth.

## Features

-   Customer management
-   Interaction tracking
-   Analytics and reporting
-   And more...

## Entities

---

### Contact:

-   Represents a person or organization you interact with.
-   Attributes:
    -   ID (primary key)
    -   name
    -   email
    -   phone number
    -   address
    -   website
    -   social media links
    -   notes

### Organization:

-   Represents a company or other group you interact with.
-   Attributes:
    -   ID (primary key)
    -   name
    -   website
    -   industry
    -   size
    -   location
    -   notes

### Deal:

-   Represents a potential or ongoing sales opportunity.
-   Attributes:
    -   ID (primary key)
    -   name
    -   stage (e.g., lead, qualified, proposal, closed won, closed lost)
    -   value
    -   closing date
    -   probability
    -   contact ID (foreign key)
    -   organization ID (foreign key)

### Task:

-   Represents a specific action item that needs to be completed.
-   Attributes:
    -   ID (primary key)
    -   name
    -   due date
    -   priority
    -   status (e.g., open, in progress, completed)
    -   description
    -   contact ID (foreign key)
    -   deal ID (foreign key)

### Activity:

-   Represents an interaction with a contact or organization (e.g., phone call, email, meeting, event).
-   Attributes:
    -   ID (primary key)
    -   type (e.g., phone call, email, meeting, event)
    -   date
    -   time
    -   subject
    -   notes
    -   contact ID (foreign key)
    -   deal ID (foreign key)
    -   user ID (foreign key)

### User:

-   Represents a person who uses the system.
-   Attributes:
    -   ID (primary key)
    -   name
    -   email
    -   password
    -   role (e.g., administrator, salesperson, customer service representative)

## Relationships

---

-   One Contact can belong to one Organization (one-to-one).
-   One Deal can be associated with one Contact and one Organization (many-to-many).
-   One Task can be associated with one Deal (many-to-one).
-   One Activity can be associated with one Contact, one Deal, and one User (many-to-many).
-   One User can create many Activities (one-to-many).

### Tech Stack

-   Laravel 10.x
-   Filament 3.2
