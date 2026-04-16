<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;

class StorefrontCmsSeeder extends Seeder
{
    public function run(): void
    {
        Page::updateOrCreate(['slug' => 'nosotros'], [
            'title' => 'Nuestra Historia',
            'meta_description' => 'Conozca la historia de Mayor de Repuesto LA CIMA, C.A., líderes en soluciones industriales.',
            'meta_keywords' => 'historia, la cima, repuestos, venezuela, repuestos pesados',
            'is_active' => true,
            'content_html' => '
<div class="prose prose-lg max-w-4xl mx-auto space-y-12 pb-16">
    <div class="text-center mb-16">
        <h2 class="text-5xl font-black uppercase tracking-tighter text-black mb-4">Más de 20 Años Forjando la Industria</h2>
        <div class="w-24 h-2 bg-primary mx-auto mb-8"></div>
        <p class="text-xl text-stone-600 font-medium leading-relaxed">MAYOR DE REPUESTO LA CIMA, C.A. no es solo un distribuidor; somos el músculo técnico que mantiene en movimiento el sector de manufactura, transporte y construcción.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">
        <div class="bg-stone-50 p-8 rounded-2xl border border-outline hover:shadow-xl transition-shadow">
            <span class="material-symbols-outlined text-4xl text-primary mb-4 block">visibility</span>
            <h3 class="text-2xl font-bold uppercase mb-3">Nuestra Visión</h3>
            <p class="text-stone-600 text-sm">Convertirnos en el aliado estratégico #1 del continente en la provisión de partes industriales genuinas, erradicando los tiempos de inactividad de nuestros clientes.</p>
        </div>
        <div class="bg-black text-white p-8 rounded-2xl border border-stone-800 hover:shadow-xl transition-shadow relative overflow-hidden">
            <div class="absolute -right-8 -bottom-8 opacity-10">
                <span class="material-symbols-outlined text-9xl">flag</span>
            </div>
            <span class="material-symbols-outlined text-4xl text-primary mb-4 block relative z-10">rocket_launch</span>
            <h3 class="text-2xl font-bold uppercase mb-3 relative z-10">Nuestra Misión</h3>
            <p class="text-stone-300 text-sm relative z-10">Ofrecer repuestos garantizados con un soporte de ingeniería superior, elevando los estándares de seguridad y eficiencia en maquinarias pesadas.</p>
        </div>
    </div>
</div>
            '
        ]);

        Page::updateOrCreate(['slug' => 'soporte'], [
            'title' => 'Soporte de Ingeniería',
            'meta_description' => 'Solicite soporte técnico para instalación y análisis de fallas de piezas industriales.',
            'meta_keywords' => 'soporte tecnico, ingenieria, manuales, fallas motor',
            'is_active' => true,
            'content_html' => '
<div class="max-w-5xl mx-auto space-y-12">
    <div class="bg-primary text-black p-12 rounded-3xl mb-12 shadow-2xl relative overflow-hidden">
        <div class="relative z-10 max-w-2xl">
            <h2 class="text-4xl font-black uppercase tracking-tighter mb-4">Soporte Técnico Especializado</h2>
            <p class="font-bold text-lg mb-8 opacity-90">Nuestros ingenieros certificados por fábrica están disponibles 24/7 para asistir en protocolos de instalación complejos y diagnósticos de sistemas de inyección.</p>
            <a href="/tienda/contacto" class="bg-black text-white px-8 py-4 uppercase font-bold text-xs tracking-widest hover:bg-stone-800 transition rounded shadow-lg block w-max">Abrir Ticket de Soporte</a>
        </div>
        <span class="material-symbols-outlined absolute right-0 top-1/2 -translate-y-1/2 text-[20rem] opacity-20 pointer-events-none mix-blend-overlay">engineering</span>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="border border-outline p-6 rounded-xl hover:border-black transition cursor-pointer group">
            <h4 class="font-bold uppercase text-lg mb-2 group-hover:text-primary">Descarga de Manuales</h4>
            <p class="text-xs text-stone-500">Acceda a la biblioteca técnica de torques y tolerancias de motores Cummins y Volvo.</p>
        </div>
        <div class="border border-outline p-6 rounded-xl hover:border-black transition cursor-pointer group">
            <h4 class="font-bold uppercase text-lg mb-2 group-hover:text-primary">Garantías (RMA)</h4>
            <p class="text-xs text-stone-500">Inicie procesos de revisión técnica por posibles defectos de fábrica en tiempo récord.</p>
        </div>
        <div class="border border-outline p-6 rounded-xl hover:border-black transition cursor-pointer group">
            <h4 class="font-bold uppercase text-lg mb-2 group-hover:text-primary">Línea Directa</h4>
            <p class="text-xs text-stone-500">Comuníquese y pida conexión con un Ingeniero de Soporte Nivel 3. (Solo clientes B2B).</p>
        </div>
    </div>
</div>
            '
        ]);

        Page::updateOrCreate(['slug' => 'terminos_b2b'], [
            'title' => 'Términos y Condiciones Comerciales',
            'meta_description' => 'Políticas comerciales y términos de compra al por mayor e industria.',
            'meta_keywords' => 'terminos, legal, politica de envios, B2B, comercial',
            'is_active' => true,
            'content_html' => '
<div class="prose prose-lg max-w-3xl mx-auto pb-16">
    <div class="p-6 bg-stone-100 rounded-lg border-l-4 border-primary mb-8">
        <strong class="uppercase text-xs font-black tracking-widest text-black">Aviso Legal Importante</strong>
        <p class="text-sm mt-2 font-medium text-stone-700">Las presentes condiciones regulan de forma exclusiva la venta corporativa mayorista. Toda compra de nivel de distribución requiere revisión crediticia.</p>
    </div>

    <h3 class="text-2xl font-black uppercase text-black mt-12 mb-4 border-b border-outline pb-2">1. Condiciones de Pago</h3>
    <p class="text-stone-600 text-sm leading-relaxed">Los distribuidores autorizados con línea de crédito aprobada disfrutarán de términos Net 30. Las cuentas en mora devengarán un interés por mora estándar. Para compras B2C o transaccionales urgentes, exigimos la confirmación en firme de las transferencias.</p>

    <h3 class="text-2xl font-black uppercase text-black mt-12 mb-4 border-b border-outline pb-2">2. Política de Despachos Industriales</h3>
    <p class="text-stone-600 text-sm leading-relaxed">Los repuestos de alto tonelaje (motores armados, bloques completos y turbocompresores pesados) requieren logística especializada. El riesgo (FOB) se transfiere en el momento que la mercancía abandona nuestros centros logísticos La Cima.</p>

    <h3 class="text-2xl font-black uppercase text-black mt-12 mb-4 border-b border-outline pb-2">3. Restricción de Instalación</h3>
    <p class="text-stone-600 text-sm leading-relaxed">Piezas críticas como inyectores electrónicos requieren calibración por software OEM. Fallas por instalación inadecuada en talleres no certificados anularán la garantía instantáneamente.</p>
</div>
            '
        ]);
    }
}
