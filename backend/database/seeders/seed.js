const { PrismaClient } = require('@prisma/client');
const bcrypt = require('bcrypt');

const prisma = new PrismaClient();

async function seed() {
  console.log('🌱 Seeding database...');

  try {
    // Create default users
    const adminPassword = await bcrypt.hash('admin123', 10);
    const managerPassword = await bcrypt.hash('manager123', 10);
    const userPassword = await bcrypt.hash('user123', 10);

    const users = await prisma.user.createMany({
      data: [
        {
          name: 'Administrador',
          email: 'admin@lacima.com',
          password: adminPassword,
          role: 'ADMIN',
        },
        {
          name: 'Gerente',
          email: 'manager@lacima.com',
          password: managerPassword,
          role: 'MANAGER',
        },
        {
          name: 'Usuario Demo',
          email: 'usuario@lacima.com',
          password: userPassword,
          role: 'USER',
        },
      ],
      skipDuplicates: true,
    });

    console.log(`✅ Users created: ${users.count} new records`);

    // Create default categories
    const categories = await prisma.category.createMany({
      data: [
        { name: 'Motor', icon: 'settings', description: 'Repuestos de motor y componentes relacionados' },
        { name: 'Frenos', icon: 'stop_circle', description: 'Sistema de frenos y componentes' },
        { name: 'Suspensión', icon: 'build', description: 'Componentes de suspensión y dirección' },
        { name: 'Transmisión', icon: 'settings_input_component', description: 'Sistema de transmisión' },
        { name: 'Carrocería', icon: 'directions_car', description: 'Partes de carrocería y exteriores' },
        { name: 'Electrónica', icon: 'electrical_services', description: 'Componentes eléctricos y electrónicos' },
        { name: 'Filtros', icon: 'filter_alt', description: 'Filtros de aire, aceite y combustible' },
      ],
      skipDuplicates: true,
    });

    console.log(`✅ Categories created: ${categories.count} new records`);

    // Get categories for reference
    const categoryMotor = await prisma.category.findFirst({ where: { name: 'Motor' } });
    const categoryFrenos = await prisma.category.findFirst({ where: { name: 'Frenos' } });
    const categorySuspension = await prisma.category.findFirst({ where: { name: 'Suspensión' } });
    const categoryTransmision = await prisma.category.findFirst({ where: { name: 'Transmisión' } });

    // Create default products
    const products = await prisma.product.createMany({
      data: [
        {
          sku: 'DIS-4421-VTL',
          name: 'Kit de Discos de Freno Ventilados',
          description: 'Discos de freno ventilados de alto rendimiento para vehículos pesados',
          price: 85.00,
          stock: 50,
          category: 'Frenos',
          brand: 'Toyota',
          origin: 'Japón',
          active: true,
        },
        {
          sku: 'INJ-CAT-882',
          name: 'Inyector de Combustible Heavy Duty',
          description: 'Inyector de combustible para motores Caterpillar C7/C9',
          price: 320.00,
          stock: 0,
          category: 'Motor',
          brand: 'Caterpillar',
          origin: 'USA',
          active: true,
        },
        {
          sku: 'SUS-101-DEL',
          name: 'Amortiguador Reforzado Delantero',
          description: 'Amortiguador delantero reforzado para uso pesado',
          price: 145.00,
          stock: 12,
          category: 'Suspensión',
          brand: 'Toyota',
          origin: 'Japón',
          active: true,
        },
        {
          sku: 'TRS-55-FIL',
          name: 'Filtro de Transmisión Automática',
          description: 'Filtro original para transmisión automática',
          price: 42.50,
          stock: 100,
          category: 'Transmisión',
          brand: 'Toyota',
          origin: 'Japón',
          active: true,
        },
        {
          sku: 'TRB-VGT-84521',
          name: 'Turboalimentador Variable VGT',
          description: 'Turbo de geometría variable para motores diesel',
          price: 845.00,
          stock: 8,
          category: 'Motor',
          brand: 'Toyota',
          origin: 'Japón',
          active: true,
        },
        {
          sku: 'BRK-9004-HD',
          name: 'Pastillas de Freno Heavy Duty',
          description: 'Pastillas de freno de alto rendimiento para uso intensivo',
          price: 129.50,
          stock: 45,
          category: 'Frenos',
          brand: 'Toyota',
          origin: 'Japón',
          active: true,
        },
      ],
      skipDuplicates: true,
    });

    console.log(`✅ Products created: ${products.count} new records`);

    // Create default employee
    const employees = await prisma.employee.createMany({
      data: [
        {
          firstName: 'Juan',
          lastName: 'Pérez',
          dni: '12345678',
          email: 'juan.perez@lacima.com',
          position: 'Vendedor',
          department: 'Ventas',
          hireDate: new Date('2024-01-15'),
          salary: 1500.00,
          active: true,
        },
        {
          firstName: 'María',
          lastName: 'González',
          dni: '87654321',
          email: 'maria.gonzalez@lacima.com',
          position: 'Almacenista',
          department: 'Almacén',
          hireDate: new Date('2024-03-01'),
          salary: 1200.00,
          active: true,
        },
      ],
      skipDuplicates: true,
    });

    console.log(`✅ Employees created: ${employees.count} new records`);

    console.log('🎉 Seed completed successfully!');
  } catch (error) {
    console.error('❌ Error seeding database:', error);
    throw error;
  } finally {
    await prisma.$disconnect();
  }
}

seed().catch(console.error);
