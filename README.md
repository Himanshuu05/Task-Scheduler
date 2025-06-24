# 📧 Task Scheduler with Email Verification & CRON (PHP Project)

This is a full-stack PHP project that allows users to schedule tasks with email notifications, verify subscriptions, and handle unsubscriptions. The project uses native PHP with file-based storage and CRON for automated task execution.

## 🚀 Features

- ✅ **Email Subscription System**
  - User enters email → receives a verification link
  - Link validates email and adds user to the subscriber list

- 🔐 **Email Verification**
  - Unique code generation for each pending subscription
  - Secure verification via `verify.php`

- 📬 **Unsubscription Functionality**
  - Allows users to unsubscribe via a direct link
  - Email is removed from subscriber list

- ⏰ **Task Scheduling with CRON**
  - Periodically checks for scheduled tasks
  - Sends task alerts via email to all verified subscribers

- 🛠️ **Local Storage via JSON Files**
  - `pending_subscriptions.txt`
  - `subscribers.txt`
  - `tasks.txt`

- 🔄 **Automated Email Testing**
  - GitHub CI/CD with Mailpit and Playwright
  - All checks passed ✅

---

## 🧾 File Structure

├── index.php # Frontend for task entry + email subscription
├── verify.php # Email verification link handler
├── unsubscribe.php # Link handler for email unsubscription
├── cron.php # Scheduled script to process and send emails
├── functions.php # All utility and helper functions
├── setup_cron.sh # Bash script to configure CRON jobs
├── pending_subscriptions.txt
├── subscribers.txt
└── tasks.txt

---

## 🖥️ How to Run Locally

1. **Clone the Repo**
   ```bash
   git clone <repo_url>
   cd task-scheduler-Himanshu05
Create a Branch
git checkout -b task-scheduler-Himanshu05
Start a Local PHP Server

php -S localhost:8000
Set Up CRON Job

chmod +x setup_cron.sh
./setup_cron.sh
🧰 Tech Stack
PHP 8.3

HTML/CSS

CRON (Linux Scheduler)

JSON (as DB substitute)

Mailpit (for mock email testing)

📮 Demo Flow
User subscribes via form

Email with verification link sent

Upon clicking, user is verified

User enters a task

CRON job triggers cron.php and sends email to all verified users

User can unsubscribe anytime

👨‍💻 Author
Himanshu Paswan
B.Tech CSE @ Galgotias University
Email: himanshupaswan987@gmail.com
LinkedIn: https://www.linkedin.com/in/himanshu-paswan-072251246/
