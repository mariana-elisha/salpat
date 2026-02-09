# QUICK START GUIDE - Lodge Booking System

## HATUA ZA KUFUATA (Step by Step):

### STEP 1: Ongeza Rooms Kwenye Database
**Double-click file hii:**
```
FIX-EVERYTHING.bat
```

Hii ita:
- Kuangalia kama rooms zipo
- Kufuta database na kuunda upya
- Kuongeza rooms 3 (Family Room, Standard Double, Single Room)
- Kuonyesha list ya rooms zilizoongezwa

---

### STEP 2: Anzisha Server
**Double-click file hii:**
```
start-server.bat
```

Au endesha kwenye Command Prompt:
```cmd
cd C:\xampp\htdocs\Campsallpat
C:\xampp\php\php.exe artisan serve
```

Utakiona message:
```
Laravel development server started: http://127.0.0.1:8000
```

---

### STEP 3: Fungua Browser
Fungua browser yako na nenda kwenye:

**Homepage:**
```
http://127.0.0.1:8000
```

**Au nenda moja kwa moja kwenye Rooms:**
```
http://127.0.0.1:8000/rooms
```

---

## KAMA BADO HUONA CHOCHOTE:

### 1. Hard Refresh Browser
- Press `Ctrl + F5` kwenye browser
- Au `Ctrl + Shift + R`

### 2. Angalia Kama Server Inaendesha
- Kwenye terminal, unaona "Laravel development server started"?
- Kama hapana, endesha `start-server.bat` tena

### 3. Angalia Kama Rooms Zipo
- Double-click `check-rooms.bat`
- Unaona rooms 3?
- Kama hapana, endesha `FIX-EVERYTHING.bat` tena

### 4. Clear Browser Cache
- Press `Ctrl + Shift + Delete`
- Chagua "Cached images and files"
- Click "Clear data"

---

## TROUBLESHOOTING:

### Error: "Connection refused"
**Solution:** Anzisha server kwanza (`start-server.bat`)

### Error: "404 Not Found"
**Solution:** Hakikisha unaenda kwenye URL sahihi:
- `http://127.0.0.1:8000` (homepage)
- `http://127.0.0.1:8000/rooms` (rooms list)

### Hakuna Rooms Zinazoonekana
**Solution:** 
1. Endesha `FIX-EVERYTHING.bat`
2. Hard refresh browser (`Ctrl + F5`)
3. Angalia kama unaona rooms kwenye output ya batch file

---

## CONTACT:
Kama bado una shida, nijulishe:
1. Nini unakiona kwenye browser?
2. Nini unakiona kwenye terminal/server?
3. Nini unakiona baada ya kuendesha `FIX-EVERYTHING.bat`?
