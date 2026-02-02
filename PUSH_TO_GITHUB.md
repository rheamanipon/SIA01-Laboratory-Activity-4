# Push This Lab to Your GitHub Repository

Your code is committed locally. Follow these steps to push it to **your** public GitHub repo.

---

## Step 1: Create a new repository on GitHub

1. Go to **https://github.com** and sign in.
2. Click the **+** (top right) → **New repository**.
3. Fill in:
   - **Repository name:** e.g. `cms-monolithic-legacy-php` or `sia01-lab4-cms-manipon`
   - **Description:** (optional) e.g. "SIA01 Lab 4 - Extended CMS with product sales"
   - **Public**
   - **Do NOT** check "Add a README" (you already have code).
4. Click **Create repository**.

---

## Step 2: Add your GitHub repo as remote and push

Open **PowerShell** or **Command Prompt**, go to this project folder, then run (replace `YOUR_USERNAME` and `YOUR_REPO_NAME` with your GitHub username and repo name):

```bash
cd c:\xampp\htdocs\cms-monolithic-legacy-php-main

git remote add origin https://github.com/YOUR_USERNAME/YOUR_REPO_NAME.git

git branch -M master

git push -u origin master
```

**Example** (if your username is `rheamanipon` and repo is `cms-monolithic-legacy-php`):

```bash
git remote add origin https://github.com/rheamanipon/cms-monolithic-legacy-php.git
git branch -M master
git push -u origin master
```

---

## Step 3: Authenticate when prompted

- **HTTPS:** GitHub will ask for your username and **Personal Access Token** (not your account password).  
  Create a token: GitHub → Settings → Developer settings → Personal access tokens → Generate new token (classic). Give it `repo` scope.
- **SSH:** If you use SSH keys, use this instead:
  ```bash
  git remote add origin git@github.com:YOUR_USERNAME/YOUR_REPO_NAME.git
  ```

---

## If you already created the repo by cloning from GitHub

If you had cloned **your own** empty repo (not the AUF one) and then copied files into it:

```bash
cd c:\xampp\htdocs\cms-monolithic-legacy-php-main
git remote -v
```

If `origin` already points to your repo, just run:

```bash
git push -u origin master
```

---

## Future updates

After the first push, for later changes:

```bash
cd c:\xampp\htdocs\cms-monolithic-legacy-php-main
git add .
git commit -m "Your message"
git push
```
