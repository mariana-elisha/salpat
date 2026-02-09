# Fix PowerShell Execution Policy for npm

## The Problem
PowerShell is blocking npm scripts due to execution policy restrictions.

## Solution 1: Use Command Prompt (CMD) Instead (Easiest)

Instead of PowerShell, use Command Prompt:

1. Press `Win + R`
2. Type `cmd` and press Enter
3. Navigate to your project:
   ```cmd
   cd C:\xampp\htdocs\Campsallpat
   ```
4. Run npm commands:
   ```cmd
   npm install
   npm run build
   ```

---

## Solution 2: Change PowerShell Execution Policy (Requires Admin)

### Option A: For Current User Only (Recommended)
1. Open PowerShell as Administrator:
   - Right-click Start button
   - Click "Windows PowerShell (Admin)" or "Terminal (Admin)"
2. Run this command:
   ```powershell
   Set-ExecutionPolicy -ExecutionPolicy RemoteSigned -Scope CurrentUser
   ```
3. Type `Y` when prompted
4. Close and reopen your PowerShell window
5. Try npm commands again

### Option B: Temporarily Bypass (One-time)
Run this before npm commands:
```powershell
Set-ExecutionPolicy -ExecutionPolicy Bypass -Scope Process
npm install
npm run build
```

---

## Solution 3: Use npm.cmd Directly

In PowerShell, use the `.cmd` extension:
```powershell
npm.cmd install
npm.cmd run build
```

---

## Solution 4: Use Git Bash (If Installed)

If you have Git installed, you can use Git Bash:
1. Right-click in your project folder
2. Select "Git Bash Here"
3. Run:
   ```bash
   npm install
   npm run build
   ```

---

## Recommended: Use Command Prompt

The easiest solution is to use Command Prompt (cmd.exe) instead of PowerShell for npm commands.

---

## After Fixing

Once npm works, run:
```bash
npm install
npm run build
```

This will create the `public/build/` folder with compiled assets.
