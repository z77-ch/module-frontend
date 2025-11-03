# Z77 Module: Frontend

[![Build Status](https://img.shields.io/github/actions/workflow/status/z77/module-frontend/ci.yml?branch=main)](https://github.com/z77/module-frontend/actions)
[![Latest Stable Version](https://img.shields.io/packagist/v/z77/module-frontend)](https://packagist.org/packages/z77/module-frontend)
[![License](https://img.shields.io/github/license/z77/module-frontend)](LICENSE)

---

## Übersicht

`Z77/module-frontend` ist das **Frontend-Modul** der Z77-Plattform.
Es stellt die Benutzeroberfläche bereit, organisiert die Präsentations-, Anwendungs- und Domain-Logik für das Frontend und kapselt Ressourcen wie Templates, Assets und Übersetzungen.

**Features:**

- Frontend-Controller (`Ui/Controllers`) für Requests
- Application Services (`App/Services`) zur Orchestrierung von Use Cases
- Domain-Logik (`Dom/`) mit Entities, Repositories, Services und Validierungen
- Ressourcen (`res/`) mit Templates, Assets und Übersetzungen

---

## Architektur

module-frontend/
├── src/
│ ├── Ui/
│ │ └── Controllers/
│ ├── App/
│ │ └── Services/
│ └── Dom/
│ ├── Entities/
│ ├── Repositories/
│ ├── Validators/
│ └── Services/
├── res/
│ ├── view/templates/
│ ├── lang/
│ └── assets/
├── composer.json
└── README.md


---

## Installation

Installiere das Modul über Composer:

```bash
composer require z77/module-frontend
