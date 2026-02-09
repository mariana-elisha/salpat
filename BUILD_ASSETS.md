# Building Frontend Assets

## The Error
You're seeing: `Vite manifest not found at: public/build/manifest.json`

This happens because the CSS and JavaScript files haven't been compiled yet.

## Solution 1: Build Assets (Recommended)

### Step 1: Install Node.js and npm
If you don't have Node.js installed:
1. Download from: https://nodejs.org/
2. Install it (this includes npm)
3. Restart your terminal/command prompt

### Step 2: Install Dependencies
Open terminal in your project folder and run:
```bash
npm install
```

### Step 3: Build Assets
For production:
```bash
npm run build
```

For development (with hot reload):
```bash
npm run dev
```

### Step 4: Refresh Browser
After building, refresh your browser at http://127.0.0.1:8000

---

## Solution 2: Temporary CDN Fix (Quick Fix)

I've already updated your layout file to use a CDN fallback when Vite assets aren't built. This should work immediately, but you should still build the assets properly for production.

**The layout now automatically uses Tailwind CSS CDN if Vite assets aren't found.**

---

## Verify It's Working

After building, you should see:
- `public/build/manifest.json` file exists
- `public/build/assets/` folder with CSS and JS files

---

## Common Issues

### "npm is not recognized"
- Make sure Node.js is installed
- Restart your terminal after installing Node.js
- Or use full path if Node.js is installed but not in PATH

### "npm install" fails
- Check your internet connection
- Try: `npm install --legacy-peer-deps`
- Or: `npm cache clean --force` then `npm install`

### Build takes too long
- This is normal for the first build
- Subsequent builds are faster

---

## For Development

If you're actively developing, use:
```bash
npm run dev
```

This will watch for changes and rebuild automatically. Keep this terminal window open while developing.
