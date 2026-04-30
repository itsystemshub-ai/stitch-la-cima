const fs = require('fs');
const path = require('path');

function processDirectory(dir) {
    const files = fs.readdirSync(dir);
    for (const file of files) {
        const fullPath = path.join(dir, file);
        if (fs.statSync(fullPath).isDirectory()) {
            processDirectory(fullPath);
        } else if (fullPath.endsWith('.blade.php')) {
            processFile(fullPath);
        }
    }
}

function processFile(filePath) {
    let content = fs.readFileSync(filePath, 'utf8');
    let original = content;

    // Radius replacements
    content = content.replace(/rounded-\[40px\]/g, 'rounded-2xl');
    content = content.replace(/rounded-\[32px\]/g, 'rounded-xl');
    content = content.replace(/rounded-\[28px\]/g, 'rounded-xl');
    content = content.replace(/rounded-4xl/g, 'rounded-xl');
    content = content.replace(/rounded-3xl/g, 'rounded-xl');

    // Padding & Margins
    content = content.replace(/\bp-12\b/g, 'p-6');
    content = content.replace(/\bp-10\b/g, 'p-5');
    content = content.replace(/\bp-8\b/g, 'p-5');
    content = content.replace(/\bmb-12\b/g, 'mb-6');
    content = content.replace(/\bgap-10\b/g, 'gap-5');
    content = content.replace(/\bgap-8\b/g, 'gap-4');

    // Font Sizes (Standardizing to Golden UI Density)
    content = content.replace(/\btext-6xl\b/g, 'text-3xl');
    content = content.replace(/\btext-5xl\b/g, 'text-2xl');
    content = content.replace(/\btext-4xl\b/g, 'text-xl');
    
    // Giant Background Icons
    content = content.replace(/text-\[300px\]/g, 'text-[120px] opacity-10');
    content = content.replace(/text-\[200px\]/g, 'text-[80px] opacity-10');
    content = content.replace(/text-\[100px\]/g, 'text-[60px] opacity-10');

    // Light Theme Purge (Optional, targeting main cards)
    // We will change big dark boxes to dense light boxes with borders
    // but keep text contrast readable.
    content = content.replace(/bg-stone-900\s(.*)text-white/g, 'bg-white border border-stone-200 shadow-sm $1 text-stone-900');
    
    if (content !== original) {
        fs.writeFileSync(filePath, content, 'utf8');
        console.log(`Updated: ${filePath}`);
    }
}

const targetDir = path.join(__dirname, 'resources', 'views', 'erp');
console.log(`Starting mass UI density normalization in: ${targetDir}`);
processDirectory(targetDir);
console.log('Done!');
