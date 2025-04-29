# Smart-Expense(Expense-Tracket-App)

## Project-overview:
**Smart-Expense** is a simple and powerful expense tracker application that allows users to manage their income, expenses, and budgets efficiently.  
It includes role-based access, Google social login, automatic budget notifications, and transaction reports with PDF download options.

## Key Features:

- **Role Management**
  - Separate roles for Admin and User with different access permissions.
  
- **Google Social Login**
  - Secure login and registration using **Google** OAuth via Socialite.

- **Category Management (Gate Authorization)**
  - Create, update, and delete categories for income and expense tracking.
  - Use Laravel Gates to control editing permissions.

- **Transaction Management (Gate Authorization)**
  - Add, edit, and delete transactions (both income and expense).
  - Use Laravel Gates to control editing permissions.

- **Budget Management (Gate Authorization)**
  - Users can set budgets for different categories.
  - Use Laravel Gates to control editing permissions.

- **Automatic Email Notifications**
  - If a user’s expense exceeds the set budget, the system sends an automatic email alert.

- **Reports and PDF Download**
  - View detailed financial reports.
  - Download reports in **PDF** format

  ## Technologies Used
  
  - Laravel (PHP Framework)
  - Laravel Socialite (Google Login)
  - Laravel Gates & Policies (Authorization)
  - Laravel Notifications (Email)
  - Laravel DOMPDF (PDF Generation)
 
## ScreenShots
![image](https://github.com/user-attachments/assets/77285c59-6fe5-499b-b33c-cf9b8ce94c46)

