<div align="center">

# Xenzer Health Portal

**A role-based PHP healthcare portal for patients, doctors, facilities, and administrators.**

<img src="https://img.shields.io/badge/Completed_healthcare_web_project-4F86FF?style=flat-square&labelColor=0B1224" alt="Completed healthcare web project" /> <img src="https://img.shields.io/badge/Public_repository-4F86FF?style=flat-square&labelColor=0B1224" alt="Public repository" />

[Portfolio](https://kavindudamsith.tech/) &nbsp;|&nbsp; [LinkedIn](https://www.linkedin.com/in/kavindu-damsith-86696722a/) &nbsp;|&nbsp; [Email](mailto:kavindudamsith65@gmail.com)

</div>

---

## Overview

Xenzer is a server-rendered healthcare and facility portal. Public pages present rooms and services, patients can view appointments and reports, doctors can manage medical reports, and administrators manage doctors, settings, queries, and operational data.

## What it does

| Area | Details |
| --- | --- |
| **Patient area** | Appointments, reports, rooms, contact, and account-facing pages. |
| **Doctor workspace** | Doctor authentication, dashboard, and medical-report creation. |
| **Administration** | Doctor management, appointments, settings, user queries, and dashboard views. |
| **Facility content** | Rooms, gym, pool, cafe, spa, tennis, Wi-Fi, and general site information. |
| **Relational data** | A MySQL export defines the healthcare portal database. |

## Repository map

| Path | Purpose |
| --- | --- |
| `index.php, About.php, room.php` | Public website and facility pages. |
| `myAppointments.php and myReports.php` | Patient appointment and medical-report views. |
| `doctor/` | Doctor login, dashboard, and report workflow. |
| `admin/` | Administration dashboard, settings, doctor management, and queries. |
| `Inc/` | Shared headers, footer, links, and slider. |
| `database/xenzer3.sql` | MySQL schema and development data. |

## Technology

- **PHP**
- **MySQL**
- **JavaScript**
- **HTML**
- **CSS**
- **Bootstrap**

## Local setup

```bash
# Import database/xenzer3.sql into a local MySQL database
# Configure the database connection files
# Serve from the repository root
php -S localhost:8000
```

### Configuration notes

Update the database settings in the shared connection files before running. Treat the SQL export as development data and review it before importing.

## Status

Completed healthcare web project.

## Links

- [Portfolio project index](https://kavindudamsith.tech/#work)

---

Questions about this repository? [Email me](mailto:kavindudamsith65@gmail.com) or connect on [LinkedIn](https://www.linkedin.com/in/kavindu-damsith-86696722a/).
