@echo off
chcp 65001 >nul
echo ========================================================
echo   Sao chep hinh anh Tru Sac Xe Dien qua images_product
echo ========================================================

set "SRC_DIR=..\upload\images_product_cycletech"
set "DST_DIR=..\upload\images_product"

if not exist "%DST_DIR%\full_images" mkdir "%DST_DIR%\full_images"
if not exist "%DST_DIR%\resize_images" mkdir "%DST_DIR%\resize_images"

echo Dang sao chep thu muc full_images...
xcopy /Y /D "%SRC_DIR%\full_images\*.*" "%DST_DIR%\full_images\"
xcopy /Y /D "%SRC_DIR%\full_images\*.*" "%DST_DIR%\"

echo Dang sao chep thu muc resize_images...
xcopy /Y /D "%SRC_DIR%\resize_images\*.*" "%DST_DIR%\resize_images\"

echo.
echo ========================================================
echo   Hoan tat sao chep hinh anh thanh cong!
echo ========================================================
pause
