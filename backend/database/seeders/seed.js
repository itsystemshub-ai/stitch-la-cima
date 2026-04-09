const { PrismaClient } = require('@prisma/client');
const bcrypt = require('bcrypt');

const prisma = new PrismaClient();

async function seed() {
  console.log('🌱 Seeding database for all ERP modules...\n');

  try {
    // ==========================================
    // 1. USERS
    // ==========================================
    console.log('👥 Creating users...');
    const adminPassword = await bcrypt.hash('admin123', 10);
    const managerPassword = await bcrypt.hash('manager123', 10);
    const userPassword = await bcrypt.hash('user123', 10);

    await prisma.user.createMany({
      data: [
        { name: 'Administrador', email: 'admin@lacima.com', password: adminPassword, role: 'ADMIN' },
        { name: 'Gerente', email: 'manager@lacima.com', password: managerPassword, role: 'MANAGER' },
        { name: 'Empleado Ventas', email: 'ventas@lacima.com', password: userPassword, role: 'EMPLOYEE' },
        { name: 'Usuario Demo', email: 'usuario@lacima.com', password: userPassword, role: 'USER' },
      ],
      skipDuplicates: true,
    });
    console.log('   ✅ 4 users created\n');

    // ==========================================
    // 2. CATEGORIES
    // ==========================================
    console.log('📁 Creating categories...');
    await prisma.category.createMany({
      data: [
        { name: 'Motor', icon: 'settings', description: 'Repuestos de motor y componentes' },
        { name: 'Frenos', icon: 'stop_circle', description: 'Sistema de frenos' },
        { name: 'Suspensión', icon: 'build', description: 'Componentes de suspensión' },
        { name: 'Transmisión', icon: 'settings_input_component', description: 'Sistema de transmisión' },
        { name: 'Carrocería', icon: 'directions_car', description: 'Partes de carrocería' },
        { name: 'Electrónica', icon: 'electrical_services', description: 'Componentes eléctricos' },
        { name: 'Filtros', icon: 'filter_alt', description: 'Filtros varios' },
      ],
      skipDuplicates: true,
    });
    console.log('   ✅ 7 categories created\n');

    // ==========================================
    // 3. PRODUCTS
    // ==========================================
    console.log('📦 Creating products...');
    const productsData = [
      { sku: 'DIS-4421-VTL', name: 'Kit Discos Freno Ventilados', description: 'Discos de alto rendimiento', price: 85.00, stock: 50, category: 'Frenos', brand: 'Toyota', origin: 'Japón' },
      { sku: 'INJ-CAT-882', name: 'Inyector Combustible HD', description: 'Inyector Caterpillar C7/C9', price: 320.00, stock: 15, category: 'Motor', brand: 'Caterpillar', origin: 'USA' },
      { sku: 'SUS-101-DEL', name: 'Amortiguador Reforzado Delantero', description: 'Uso pesado', price: 145.00, stock: 12, category: 'Suspensión', brand: 'Toyota', origin: 'Japón' },
      { sku: 'TRS-55-FIL', name: 'Filtro Transmisión Automática', description: 'Filtro original', price: 42.50, stock: 100, category: 'Transmisión', brand: 'Toyota', origin: 'Japón' },
      { sku: 'TRB-VGT-84521', name: 'Turbo VGT Geometría Variable', description: 'Turbo diesel', price: 845.00, stock: 8, category: 'Motor', brand: 'Toyota', origin: 'Japón' },
      { sku: 'BRK-9004-HD', name: 'Pastillas Freno HD', description: 'Alto rendimiento', price: 129.50, stock: 45, category: 'Frenos', brand: 'Toyota', origin: 'Japón' },
      { sku: 'FLT-AIR-001', name: 'Filtro de Aire', description: 'Filtro de aire estándar', price: 15.00, stock: 200, category: 'Filtros', brand: 'Universal', origin: 'Venezuela' },
      { sku: 'ELT-ALT-001', name: 'Alternador 12V', description: 'Alternador universal', price: 185.00, stock: 20, category: 'Electrónica', brand: 'Bosch', origin: 'Alemania' },
    ];

    const createdProducts = [];
    for (const p of productsData) {
      const product = await prisma.product.upsert({
        where: { sku: p.sku },
        update: p,
        create: p,
      });
      createdProducts.push(product);
    }
    console.log(`   ✅ ${createdProducts.length} products created/updated\n`);

    // ==========================================
    // 4. SUPPLIERS
    // ==========================================
    console.log('🏭 Creating suppliers...');
    await prisma.supplier.createMany({
      data: [
        { name: 'Toyota Repuestos C.A.', rif: 'J-12345678-9', email: 'ventas@toyacima.com', phone: '+58-241-1234567', address: 'Zona Industrial, Valencia', contact: 'Carlos Pérez' },
        { name: 'Caterpillar Venezuela', rif: 'J-98765432-1', email: 'repuestos@cat.com.ve', phone: '+58-212-9876543', address: 'Caracas', contact: 'Ana Rodríguez' },
        { name: 'Bosch Auto Parts', rif: 'J-11223344-5', email: 'ventas@bosch.com.ve', phone: '+58-241-5556677', address: 'Maracaibo', contact: 'Luis Martínez' },
      ],
      skipDuplicates: true,
    });
    console.log('   ✅ 3 suppliers created\n');

    // ==========================================
    // 5. EMPLOYEES
    // ==========================================
    console.log('👷 Creating employees...');
    await prisma.employee.createMany({
      data: [
        { firstName: 'Juan', lastName: 'Pérez', dni: '12345678', email: 'juan.perez@lacima.com', position: 'Vendedor Senior', department: 'Ventas', hireDate: new Date('2023-01-15'), salary: 1500.00 },
        { firstName: 'María', lastName: 'González', dni: '87654321', email: 'maria.gonzalez@lacima.com', position: 'Almacenista', department: 'Almacén', hireDate: new Date('2023-03-01'), salary: 1200.00 },
        { firstName: 'Pedro', lastName: 'Ramírez', dni: '11223344', email: 'pedro.ramirez@lacima.com', position: 'Contador', department: 'Contabilidad', hireDate: new Date('2022-06-10'), salary: 2000.00 },
        { firstName: 'Ana', lastName: 'López', dni: '55667788', email: 'ana.lopez@lacima.com', position: 'Gerente RRHH', department: 'Recursos Humanos', hireDate: new Date('2022-01-05'), salary: 2500.00 },
        { firstName: 'Carlos', lastName: 'Díaz', dni: '99887766', email: 'carlos.diaz@lacima.com', position: 'Técnico', department: 'Servicio Técnico', hireDate: new Date('2024-02-20'), salary: 1300.00 },
      ],
      skipDuplicates: true,
    });
    console.log('   ✅ 5 employees created\n');

    // ==========================================
    // 6. ACCOUNTS (Chart of Accounts - Venezuelan Standard)
    // ==========================================
    console.log('📒 Creating chart of accounts...');
    await prisma.account.createMany({
      data: [
        // ASSETS
        { code: '1.01.01', name: 'Caja', type: 'ASSET', balance: 5000.00 },
        { code: '1.01.02', name: 'Banco', type: 'ASSET', balance: 25000.00 },
        { code: '1.02.01', name: 'Cuentas por Cobrar', type: 'ASSET', balance: 15000.00 },
        { code: '1.03.01', name: 'Inventario', type: 'ASSET', balance: 50000.00 },
        { code: '1.04.01', name: 'Activos Fijos', type: 'ASSET', balance: 100000.00 },
        { code: '1.04.02', name: 'Depreciación Acumulada', type: 'ASSET', balance: -20000.00 },
        
        // LIABILITIES
        { code: '2.01.01', name: 'Cuentas por Pagar', type: 'LIABILITY', balance: 30000.00 },
        { code: '2.01.02', name: 'IVA por Pagar', type: 'LIABILITY', balance: 5000.00 },
        { code: '2.02.01', name: 'Préstamos Bancarios', type: 'LIABILITY', balance: 50000.00 },
        { code: '2.03.01', name: 'Retenciones por Pagar', type: 'LIABILITY', balance: 2000.00 },
        
        // EQUITY
        { code: '3.01.01', name: 'Capital Social', type: 'EQUITY', balance: 100000.00 },
        { code: '3.01.02', name: 'Utilidades Retenidas', type: 'EQUITY', balance: 25000.00 },
        { code: '3.01.03', name: 'Utilidad del Ejercicio', type: 'EQUITY', balance: 0 },
        
        // REVENUE
        { code: '4.01.01', name: 'Ventas de Mercancía', type: 'REVENUE', balance: 0 },
        { code: '4.01.02', name: 'Ingresos por Servicios', type: 'REVENUE', balance: 0 },
        { code: '4.02.01', name: 'Devoluciones en Ventas', type: 'REVENUE', balance: 0 },
        
        // EXPENSES
        { code: '5.01.01', name: 'Costo de Ventas', type: 'EXPENSE', balance: 0 },
        { code: '5.02.01', name: 'Gastos de Personal', type: 'EXPENSE', balance: 0 },
        { code: '5.02.02', name: 'Gastos de Alquiler', type: 'EXPENSE', balance: 0 },
        { code: '5.02.03', name: 'Gastos de Servicios', type: 'EXPENSE', balance: 0 },
        { code: '5.02.04', name: 'Depreciación', type: 'EXPENSE', balance: 0 },
        { code: '5.03.01', name: 'Gastos Financieros', type: 'EXPENSE', balance: 0 },
      ],
      skipDuplicates: true,
    });
    console.log('   ✅ 21 accounts created\n');

    // ==========================================
    // 7. SYSTEM CONFIGURATIONS
    // ==========================================
    console.log('⚙️ Creating system configurations...');
    await prisma.systemConfig.createMany({
      data: [
        // General
        { key: 'company_name', value: 'Mayor de Repuesto La Cima, C.A.', description: 'Nombre de la empresa', category: 'GENERAL' },
        { key: 'company_rif', value: 'J-40308741-5', description: 'RIF de la empresa', category: 'GENERAL' },
        { key: 'company_address', value: 'Valencia, Carabobo, Venezuela', description: 'Dirección fiscal', category: 'GENERAL' },
        { key: 'company_phone', value: '+58-241-1234567', description: 'Teléfono principal', category: 'GENERAL' },
        
        // Fiscal
        { key: 'tax_rate_iva', value: '16', description: 'Tasa IVA general (%)', category: 'FISCAL' },
        { key: 'tax_rate_iva_reducida', value: '8', description: 'Tasa IVA reducida (%)', category: 'FISCAL' },
        { key: 'seniat_contribuyente_especial', value: 'true', description: 'Es contribuyente especial', category: 'FISCAL' },
        { key: 'libro_ventas_automatico', value: 'true', description: 'Generar libro de ventas automático', category: 'FISCAL' },
        
        // Inventory
        { key: 'inventory_valuation_method', value: 'PROMEDIO_PONDERADO', description: 'Método de valoración (PROMEDIO_PONDERADO, FIFO, UEPS)', category: 'INVENTORY' },
        { key: 'low_stock_threshold_default', value: '10', description: 'Umbral de stock bajo por defecto', category: 'INVENTORY' },
        { key: 'allow_negative_stock', value: 'false', description: 'Permitir stock negativo', category: 'INVENTORY' },
        
        // Sales
        { key: 'invoice_prefix', value: 'FAC', description: 'Prefijo de factura', category: 'SALES' },
        { key: 'credit_note_prefix', value: 'NC', description: 'Prefijo nota de crédito', category: 'SALES' },
        { key: 'max_discount_percent', value: '20', description: 'Descuento máximo sin aprobación (%)', category: 'SALES' },
        { key: 'invoice_sequence', value: '1000', description: 'Secuencia actual de facturas', category: 'SALES' },
        
        // HR
        { key: 'cesta_ticket_mensual', value: '1500', description: 'Monto cesta ticket mensual (Bs)', category: 'HR' },
        { key: 'horas_jornada_semanal', value: '40', description: 'Horas de jornada semanal', category: 'HR' },
        { key: 'prestaciones_dias_por_anio', value: '15', description: 'Días de prestaciones por año', category: 'HR' },
      ],
      skipDuplicates: true,
    });
    console.log('   ✅ 17 configurations created\n');

    // ==========================================
    // 8. FIXED ASSETS
    // ==========================================
    console.log('🏢 Creating fixed assets...');
    await prisma.fixedAsset.createMany({
      data: [
        { name: 'Computadora Principal', code: 'AF-001', category: 'EQUIPO_COMP', acquisitionDate: new Date('2024-01-15'), acquisitionCost: 5000.00, usefulLife: 5, currentBookValue: 4000.00 },
        { name: 'Mobiliario de Oficina', code: 'AF-002', category: 'MOBILIARIO', acquisitionDate: new Date('2023-06-01'), acquisitionCost: 12000.00, usefulLife: 10, currentBookValue: 10200.00 },
        { name: 'Vehículo de Entrega', code: 'AF-003', category: 'VEHICULO', acquisitionDate: new Date('2023-01-01'), acquisitionCost: 35000.00, usefulLife: 8, currentBookValue: 28437.50 },
      ],
      skipDuplicates: true,
    });
    console.log('   ✅ 3 fixed assets created\n');

    // ==========================================
    // 9. SALES (Sample data)
    // ==========================================
    console.log('💰 Creating sample sales...');
    const adminUser = await prisma.user.findUnique({ where: { email: 'admin@lacima.com' } });
    const employeeUser = await prisma.user.findUnique({ where: { email: 'ventas@lacima.com' } });
    
    // Buscar productos por SKU para obtener sus nuevos UUIDs
    const prodDisco = createdProducts.find(p => p.sku === 'DIS-4421-VTL');
    const prodTurbo = createdProducts.find(p => p.sku === 'TRB-VGT-84521');
    const prodFiltro = createdProducts.find(p => p.sku === 'TRS-55-FIL');
    const prodAmortiguador = createdProducts.find(p => p.sku === 'SUS-101-DEL');
    const prodPastillas = createdProducts.find(p => p.sku === 'BRK-9004-HD');

    if (adminUser && prodDisco) {
      await prisma.sale.create({
        data: {
          userId: adminUser.id,
          invoiceNumber: 'FAC-20260401-0001',
          subtotal: 170.00,
          tax: 27.20,
          discount: 0,
          total: 197.20,
          status: 'COMPLETED',
          paymentMethod: 'PAGO_MOVIL',
          items: {
            create: [
              { productId: prodDisco.id, quantity: 2, price: 85.00 },
            ]
          }
        }
      });

      if (prodTurbo && prodFiltro) {
        await prisma.sale.create({
          data: {
            userId: employeeUser?.id || adminUser.id,
            invoiceNumber: 'FAC-20260402-0002',
            subtotal: 965.00,
            tax: 154.40,
            discount: 50.00,
            total: 1069.40,
            status: 'COMPLETED',
            paymentMethod: 'CARD',
            items: {
              create: [
                { productId: prodTurbo.id, quantity: 1, price: 845.00 },
                { productId: prodFiltro.id, quantity: 2, price: 42.50 },
                { productId: prodDisco.id, quantity: 1, price: 85.00 },
              ]
            }
          }
        });
      }

      if (prodAmortiguador && prodPastillas) {
        await prisma.sale.create({
          data: {
            userId: employeeUser?.id || adminUser.id,
            invoiceNumber: 'FAC-20260403-0003',
            subtotal: 274.50,
            tax: 43.92,
            discount: 0,
            total: 318.42,
            status: 'COMPLETED',
            paymentMethod: 'CASH',
            items: {
              create: [
                { productId: prodAmortiguador.id, quantity: 1, price: 145.00 },
                { productId: prodPastillas.id, quantity: 1, price: 129.50 },
              ]
            }
          }
        });
      }
    }
    console.log('   ✅ 3 sample sales created\n');

    // ==========================================
    // 10. ACCOUNTS RECEIVABLE
    // ==========================================
    console.log('📊 Creating accounts receivable...');
    await prisma.accountsReceivable.createMany({
      data: [
        { customerId: 'CUST-001', customerName: 'Transportes Rápidos C.A.', saleId: null, invoiceNumber: 'FAC-20260401-0001', amount: 5000.00, paidAmount: 2500.00, dueDate: new Date('2026-05-01'), status: 'PARTIAL' },
        { customerId: 'CUST-002', customerName: 'Inversiones El Paseo', saleId: null, invoiceNumber: 'FAC-20260402-0002', amount: 3200.00, paidAmount: 0, dueDate: new Date('2026-04-30'), status: 'PENDING' },
        { customerId: 'CUST-003', customerName: 'Flota Industrial 2000', saleId: null, invoiceNumber: 'FAC-20260403-0003', amount: 8750.00, paidAmount: 8750.00, dueDate: new Date('2026-04-15'), status: 'PAID' },
      ],
      skipDuplicates: true,
    });
    console.log('   ✅ 3 receivables created\n');

    // ==========================================
    // 11. JOURNAL ENTRIES (Sample)
    // ==========================================
    console.log('📝 Creating sample journal entries...');
    // Buscar cuentas por código para obtener UUIDs
    const accCaja = await prisma.account.findUnique({ where: { code: '1.01.01' } });
    const accBanco = await prisma.account.findUnique({ where: { code: '1.01.02' } });
    const accVentas = await prisma.account.findUnique({ where: { code: '4.01.01' } });
    const accIvaVentas = await prisma.account.findUnique({ where: { code: '2.01.02' } });

    if (accBanco && accVentas && accIvaVentas) {
      await prisma.journalEntry.create({
        data: {
          number: 'JE-2026-0001',
          date: new Date('2026-04-01'),
          description: 'Registro de venta del día - Facturas 0001-0003',
          totalDebit: 1585.02,
          totalCredit: 1585.02,
          posted: true,
          lines: {
            create: [
              { accountId: accBanco.id, debit: 1585.02, credit: 0, description: 'Cobros en banco' },
              { accountId: accVentas.id, debit: 0, credit: 1409.50, description: 'Ingresos por ventas' },
              { accountId: accIvaVentas.id, debit: 0, credit: 175.52, description: 'IVA cobrado en ventas' },
            ]
          }
        }
      });
    }
    console.log('   ✅ 1 journal entry created\n');

    // ==========================================
    // SUMMARY
    // ==========================================
    console.log('═══════════════════════════════════════');
    console.log('🎉 SEED COMPLETED SUCCESSFULLY!');
    console.log('═══════════════════════════════════════');
    console.log('');
    console.log('📊 Summary:');
    console.log('   👥 4 Users (ADMIN, MANAGER, EMPLOYEE, USER)');
    console.log('   📁 7 Categories');
    console.log('   📦 8 Products');
    console.log('   🏭 3 Suppliers');
    console.log('   👷 5 Employees');
    console.log('   📒 21 Accounting Accounts');
    console.log('   ⚙️  17 System Configurations');
    console.log('   🏢 3 Fixed Assets');
    console.log('   💰 3 Sample Sales');
    console.log('   📊 3 Accounts Receivable');
    console.log('   📝 1 Journal Entry');
    console.log('');
    console.log('🔑 Default Credentials:');
    console.log('   Admin:     admin@lacima.com / admin123');
    console.log('   Manager:   manager@lacima.com / manager123');
    console.log('   Employee:  ventas@lacima.com / user123');
    console.log('   User:      usuario@lacima.com / user123');
    console.log('');
    console.log('⚠️  CHANGE ALL PASSWORDS AFTER FIRST LOGIN!');
    console.log('═══════════════════════════════════════');

  } catch (error) {
    console.error('❌ Error seeding database:', error);
    throw error;
  } finally {
    await prisma.$disconnect();
  }
}

seed().catch(console.error);
