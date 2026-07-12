# SIMUO Database Blueprint v1.0

## Database Engine

MySQL 8+

Charset : utf8mb4

Collation : utf8mb4_unicode_ci

---

## Primary Key

Semua tabel menggunakan ULID.

Contoh:

id ULID PRIMARY KEY

---

## Soft Delete

Semua tabel bisnis menggunakan Soft Delete.

---

## Timestamps

Semua tabel menggunakan:

created_at

updated_at

---

## Modul Database

1. Authentication

2. Academic

3. Master

4. Question Bank

5. Examination

6. Assessment

7. Report

8. System

---

## Authentication

users

roles

permissions

sessions

password_reset_tokens

---

## Academic

academic_years

semesters

grades

classrooms

student_classrooms

subjects

rooms

---

## Master

teachers

students

guardians

teacher_subjects

teacher_classrooms

---

## Question Bank

question_categories

question_banks

questions

question_options

question_media

---

## Examination

exam_types

exam_packages

exam_package_questions

exam_schedules

exam_sessions

exam_tokens

student_answers

essay_answers

answer_logs

---

## Assessment

scores

score_details

item_analysis

rankings

---

## System

settings

activity_logs

notifications

backups

school_profiles