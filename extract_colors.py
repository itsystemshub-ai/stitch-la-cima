from PIL import Image
import collections
import os

path = r'c:\Users\ET\Documents\GitHub\stitch la cima\frontend\assets\images\AdobeColor-color theme_Logo QSP - color.png'

if not os.path.exists(path):
    print('File not found!')
    exit(1)

img = Image.open(path).convert('RGB')
pixels = list(img.getdata())

cc = collections.Counter(pixels)

output = []
output.append('=== TOP COLORS FROM ADOBE COLOR IMAGE ===')
output.append(f'Image size: {img.size}')
output.append(f'Total pixels: {len(pixels)}')
output.append(f'Unique colors: {len(cc)}')
output.append('')

for (r, g, b), count in cc.most_common(15):
    hex_color = '#{:02X}{:02X}{:02X}'.format(r, g, b)
    pct = (count / len(pixels)) * 100
    output.append(f'{hex_color}  RGB({r:>3},{g:>3},{b:>3})  {pct:>5.1f}%')

result = '\n'.join(output)
print(result)

# Save to file for reference
with open(r'c:\Users\ET\Documents\GitHub\stitch la cima\extracted_colors.txt', 'w') as f:
    f.write(result)
