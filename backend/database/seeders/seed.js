const { User, Product, Category } = require('../../src/models');
const bcrypt = require('bcrypt');

async function seed() {
  console.log('🌱 Seedin database...');

  // Create default users (migrados del sistema anterior)
  const adminPassword = await bcrypt.hash('admin123', 10);
  const userPassword = await bcrypt.hash('user123', 10);

  await User.bulkCreate([
    {
      id: '550e8400-e29b-41d4-a716-446655440001',
      name: 'Administrador',
      email: 'admin@lacima.com',
      password: adminPassword,
      role: 'admin',
      status: 'active',
    },
    {
      id: '550e8400-e29b-41d4-a716-446655440002',
      name: 'Usuario Demo',
      email: 'usuario@lacima.com',
      password: userPassword,
      role: 'user',
      status: 'active',
    },
  ], { ignoreDuplicates: true });

  console.log('✅ Usuarios creados');

  // Create default categories
  await Category.bulkCreate([
    { id: 'CAT-001', name: 'Motor', icon: 'settings', active: true },
    { id: 'CAT-002', name: 'Frenos', icon: 'stop_circle', active: true },
    { id: 'CAT-003', name: 'Suspensión', icon: 'build', active: true },
    { id: 'CAT-004', name: 'Transmisión', icon: 'settings_input_component', active: true },
    { id: 'CAT-005', name: 'Carrocería', icon: 'directions_car', active: true },
    { id: 'CAT-006', name: 'Electrónica', icon: 'electrical_services', active: true },
    { id: 'CAT-007', name: 'Filtros', icon: 'filter_alt', active: true },
  ], { ignoreDuplicates: true });

  console.log('✅ Categorías creadas');

  // Create default products (migrados de products-db.js)
  await Product.bulkCreate([
    {
      id: 'PROD-001',
      name: 'Kit de Discos de Freno Ventilados',
      sku: 'DIS-4421-VTL',
      oem: 'OEM-4421',
      categoryId: 'CAT-002',
      brand: 'Toyota',
      vehicle: 'Land Cruiser 2015+',
      price: 85.00,
      oldPrice: 102.00,
      stock: 50,
      stockStatus: 'in_stock',
      visible: true,
      image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuCNjAH9S_Dx8VtU7mF1yl1gIoO1HHxRUQR20jPWmEZ_fWPK0Lf-aqaHg5SbId7ALpHlPm1IBVe6hQPm83-NLF_KRSd1NILUJYVRLn7UO6bSjWbJHrwIEjbFqo-DEe4gv3JFYAtDUXn6VNxmvX1mo4hAlQY5e3qx9t69T02-YM-fgbgyu5g29n1SbpBH5IfDiboMUFBwLW5HUBLf0gL-uFhYCkYCmLrNxaXuJfXidw71gc1TWNKpa50EjrPRsAU9-GWS_sIc880L1A',
    },
    {
      id: 'PROD-002',
      name: 'Inyector de Combustible Heavy Duty',
      sku: 'INJ-CAT-882',
      oem: 'CAT-882',
      categoryId: 'CAT-001',
      brand: 'Caterpillar',
      vehicle: 'CAT C7/C9',
      price: 320.00,
      stock: 0,
      stockStatus: 'under_order',
      visible: true,
      image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuAiuQeey5lmq6st-vJo1TRQIs8oQtq_4Cg3QyJcj3j5bJguRJRMBb8ZSC_EXi5lrwaP7iFhysnzJ-1xPxNGrK4UF7AT2OeN8ElIvXkr9-fKhD32L0ADYy9Ey15NiRkDN8mJeDuWdAW5rDzkxw-EYW2ydO_BYYgkeF9JIGC8kwEVf-n5FRVlF_rtG7bTZ9VsR_-6AslLZLeyVYNZWjszYl7HOoO_0ZWqNEcN2WLJnxoqR8dzy5OKZhKk8pdLOhI6kvQ7oAHsQ2gQeQ',
    },
    {
      id: 'PROD-003',
      name: 'Amortiguador Reforzado Delantero',
      sku: 'SUS-101-DEL',
      oem: 'SUS-101',
      categoryId: 'CAT-003',
      brand: 'Toyota',
      vehicle: 'Land Cruiser 2015+',
      price: 145.00,
      stock: 12,
      stockStatus: 'in_stock',
      visible: true,
      image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuDHtNySrP8HrGI66TLOsvDPkaDg0OsqNHGb13gCFvCGw0QIBbKbi8njt_UPgaMng-OmtqIcDmx0wAhZUrdUXCmDeFIZM1XG2w7u_7l-k80z1giO2h8A-I1XxRLmt3-W6Idk23flMeIDf660-0qi_Dc3Uczsjnu_ZMz4jIfiTbyh7AkLSoXLrM58e4ggXYxH_nVG2JNEMfP0fVELVbhRLEirDlLmeSZR96Sd4mKGltM7moFTxvlb8IZZgiNy_dX4rJRNFQjnr-pwkw',
    },
    {
      id: 'PROD-004',
      name: 'Filtro de Transmisión Automática',
      sku: 'TRS-55-FIL',
      oem: 'TRS-55',
      categoryId: 'CAT-004',
      brand: 'Toyota',
      vehicle: 'Land Cruiser 2015+',
      price: 42.50,
      stock: 100,
      stockStatus: 'in_stock',
      visible: true,
    },
    {
      id: 'PROD-005',
      name: 'Turboalimentador Variable VGT',
      sku: 'TRB-VGT-84521',
      oem: '28231-27000',
      categoryId: 'CAT-001',
      brand: 'Toyota',
      vehicle: 'Hilux 2016-2020',
      price: 845.00,
      stock: 8,
      stockStatus: 'in_stock',
      visible: true,
      image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuDRn-wdKgaOpSBynFvnr0e_fmpdUwmPnpozU-NafufUaamlmKKGX6d-dkHr2aj7_nDx-AKznW0KzL5fIjYG7gtzalG2_9IuNT-hTRWpJiQeJzZ8511dZsT6tl5qkDqAo8LX7qK-hVKM713GcUlIo5wK0hJMgn8yJDs7Of6LasPy_8C4MbxFJrKC_7-xXWWCDrchCbWw_snA5feSSKqCid71lSKHG6-nFtzz1O8S3ya-CRGXCpluZVnH6mf88Zf6m9L0V_NoXpdkOA',
    },
    {
      id: 'PROD-006',
      name: 'Pastillas de Freno Heavy Duty',
      sku: 'BRK-9004-HD',
      oem: '04465-35290',
      categoryId: 'CAT-002',
      brand: 'Toyota',
      vehicle: 'Land Cruiser 2016+',
      price: 129.50,
      stock: 45,
      stockStatus: 'in_stock',
      visible: true,
      image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuCNjAH9S_Dx8VtU7mF1yl1gIoO1HHxRUQR20jPWmEZ_fWPK0Lf-aqaHg5SbId7ALpHlPm1IBVe6hQPm83-NLF_KRSd1NILUJYVRLn7UO6bSjWbJHrwIEjbFqo-DEe4gv3JFYAtDUXn6VNxmvX1mo4hAlQY5e3qx9t69T02-YM-fgbgyu5g29n1SbpBH5IfDiboMUFBwLW5HUBLf0gL-uFhYCkYCmLrNxaXuJfXidw71gc1TWNKpa50EjrPRsAU9-GWS_sIc880L1A',
    },
  ], { ignoreDuplicates: true });

  console.log('✅ Productos creados');
  console.log('🎉 Seed completado!');
}

seed().catch(console.error);
