// ==================== DATABASE DE PRODUCTOS ====================
    const productsDB = [
        {
            id: 1,
            name: "Junta de Culata Cummins QSB6.7",
            brand: "Cummins",
            sku: "CU-8842-X",
            price: 145.00,
            oldPrice: 170.00,
            discount: 15,
            stock: true,
            stockText: "En Stock & Listo para Envío",
            images: [
                "https://lh3.googleusercontent.com/aida-public/AB6AXuAOSV2N7Zer3liwDLfRWmf_RkjB-80GE2Pv4t8ZUYbOTRaJCjolmsuZ-PVve7HZhAYdssycXuP9ksfw1nFIDNw-c9YEn6kX8BL2fcBA0cL_gA4YcGyaDK4c-Uw2ica75f6X-gHKhoiO04ct0USJr-yYfSNuGm1r8v50fFfuRsHBJWUr-WYbfBfv8iyQ4lMuF_2cz6MbUMVNcoEAQ4vgb0yNRVeXUejs7LtYcc-H7tN2cWAgUGGsw5R_yZpRvjCMLCa2hEYYwGQq75s",
                "https://lh3.googleusercontent.com/aida-public/AB6AXuCfy-qXTblYgWgHJFriQrWuBky7vJBuEqcmjqlyZckcgTmDqYmFzzBQkRxEMV933McoKAI79m6wiF25bjhPihWj2enjKgSxsFUpN800xnt203aXsZD4lxoxsgmiLFna3REZ3mYvC8IHkXowtKUZSe6ALHYgY2MbLVWcP0PQZgAaTgkl590ckNx4Nglk1fc2TF634cXK_hNvtc063cUjDcyPjpHPuTbpdnKU7Dh9VpgcTbxNXC5iDzlyYt0XDX9vlcApdQJWbHchBqg"
            ],
            technicalNote: "Esta junta MLS (Multi-Layer Steel) está diseñada para motores Cummins 6BT de alta compresión operando bajo condiciones extremas de carga. Asegure especificaciones de torque durante la instalación.",
            specs: [
                { label: "Material", value: "Multi-Layer Steel (MLS) / Revestimiento Viton" },
                { label: "Espesor", value: "1.25mm (+/- 0.05mm)" },
                { label: "Anillo de Combustión", value: "Acero Inoxidable con Refuerzo Fire Ring" },
                { label: "Peso", value: "2.45 kg / 5.4 lbs" },
                { label: "Acabado", value: "Revestimiento técnico antiadherente" },
                { label: "Fabricación", value: "Certificado ISO 9001:2015" }
            ],
            compatibility: [
                { title: "Cummins B-Series", desc: "4BT 3.9 / 6BT 5.9" },
                { title: "Aplicaciones Industriales", desc: "Case / New Holland" },
                { title: "Años Modelo", desc: "1989 - 2002" },
                { title: "Potencia", desc: "Hasta 450 HP" }
            ],
            installation: [
                { step: "1", title: "Preparar Superficie", desc: "Limpie ambas superficies del bloque y culata. Asegure que estén libres de residuos y aceite." },
                { step: "2", title: "Posicionar Junta", desc: "Alinee la junta con los pasadores de localización. Verifique que la marca TOP quede hacia arriba." },
                { step: "3", title: "Torque de Apriete", desc: "Siga la secuencia de torque del manual: 30 ft-lbs → 60 ft-lbs → 90 ft-lbs + 90° de giro." }
            ]
        },
        {
            id: 2,
            name: "Filtro de Aceite Volvo Penta D13",
            brand: "Volvo",
            sku: "VO-1120-F",
            price: 38.50,
            oldPrice: null,
            discount: 0,
            stock: true,
            stockText: "En Stock",
            images: [
                "https://lh3.googleusercontent.com/aida-public/AB6AXuCsHZ9MFD4WCJtxE7xbkGvYvm4qisOi2hGXwJ_Zav27WFtthL07jOmeBqA3uxqD9hGFJF6jtKRFwuIbqtxbKM9d222u0u570XUHOr-3TM5d4-836PCyasLIpwwaCSnEasQ3XtaGoL4RnLluZBXOHdCtMdslZuzY0-nXPEIgnykw7T83b5acMv9DZ3XU7hKUl2gO3uCqaHBWjdvytWxJcG0h1D0ClBrKUkC2J3AKzajE4r9QkGRjpLqjmKsImGg4iReJej_zOKXcihk"
            ],
            technicalNote: "Filtro de aceite de alta eficiencia diseñado para motores Volvo Penta D13. Filtración de partículas hasta 20 micrones para máxima protección del motor.",
            specs: [
                { label: "Tipo", value: "Filtro de Aceite Spin-On" },
                { label: "Eficiencia", value: "99.5% a 20 micrones" },
                { label: "Presión Máx.", value: "150 PSI" },
                { label: "Diámetro", value: "120mm" },
                { label: "Altura", value: "280mm" },
                { label: "Certificación", value: "ISO 4548-12" }
            ],
            compatibility: [
                { title: "Volvo Penta", desc: "D13 Marine / Industrial" },
                { title: "Volvo Trucks", desc: "FH13 / FM13" },
                { title: "Años Modelo", desc: "2008 - 2024" },
                { title: "Motor", desc: "12.8L Inline-6 Turbo" }
            ],
            installation: [
                { step: "1", title: "Drenar Aceite", desc: "Drene el aceite del motor antes de retirar el filtro usado." },
                { step: "2", title: "Retirar Filtro", desc: "Use una llave de filtro para retirar el filtro antiguo en sentido antihorario." },
                { step: "3", title: "Instalar Nuevo", desc: "Lubrique la junta del nuevo filtro con aceite limpio. Instale a mano hasta hacer contacto, luego 3/4 de vuelta adicional." }
            ]
        },
        {
            id: 3,
            name: "Turbocargador Holset HE351VE",
            brand: "Holset",
            sku: "HO-449-TB",
            price: 890.00,
            oldPrice: 1050.00,
            discount: 15,
            stock: true,
            stockText: "En Stock",
            images: [
                "https://lh3.googleusercontent.com/aida-public/AB6AXuCfjrGRNpjkuVD0N23eX_RV6yqwpouLC8EQL7CLZ-gZNbKywWxWd3inP-MVZR2hDLVBek4gxi0S8M2a1vyaRrrNeSO7Az-A9ojG2JNDnWXZYN-Mw4OfOBiPiHfhiudzde1KJUKBh8fLQ5PpswyaEDpkuKbGyHZWkpaF_gyP-Ge3SsLuGxew2xe1VOh-NN5PAcB0Nh9eAzk_fIks3Qi2U8CXXHJWdVHClIKUm6ddotwdSGQ6bl6u40-453SAtwWAUnFar-PMvHvR3GM"
            ],
            technicalNote: "Turbocargador Holset HE351VE con geometría variable (VGT). Diseñado para motores Cummins ISB 6.7L con sistema de control electrónico.",
            specs: [
                { label: "Modelo", value: "HE351VE (VGT)" },
                { label: "Presión Máx.", value: "2.5 bar" },
                { label: "RPM Máx.", value: "160,000 RPM" },
                { label: "Peso", value: "8.5 kg" },
                { label: "Conexión Aceite", value: "M14x1.5" },
                { label: "Certificación", value: "Cummins Genuine Part" }
            ],
            compatibility: [
                { title: "Cummins ISB", desc: "6.7L Diesel" },
                { title: "Dodge Ram", desc: "2500/3500 2007-2018" },
                { title: "Años Modelo", desc: "2007 - 2018" },
                { title: "Potencia", desc: "200-360 HP" }
            ],
            installation: [
                { step: "1", title: "Preparar Motor", desc: "Asegure que el motor esté frío. Desconecte batería y drene líneas de aceite." },
                { step: "2", title: "Retirar Turbo Antiguo", desc: "Desconecte líneas de aceite, agua y admisión. Retire los 4 pernos de montaje." },
                { step: "3", title: "Instalar Nuevo", desc: "Use nueva junta de aceite y agua. Torque de pernos: 18 ft-lbs. Verifique rotación libre del compresor." }
            ]
        },
        {
            id: 4,
            name: "Válvula EGR Detroit DD15",
            brand: "Detroit Diesel",
            sku: "EG-221-V",
            price: 420.00,
            oldPrice: null,
            discount: 0,
            stock: true,
            stockText: "En Stock",
            images: [
                "https://lh3.googleusercontent.com/aida-public/AB6AXuCKTyHrPtqEfaH6pvwCGdF7-I4OXbWwSSA0VVvCJ2Hwl55TX8_tQAXdhZ3cVuKigbGzyZ-9DKpo-bpZxXUzYTULV4RtW7N1-xcbkK4iXcnmfLmne7Wibg8iuRbPMF8W5ei2X3VBNRT7AFKcWTsc3vTfr3uB999UrusLMap6SuiZJ6PO7G2VuXBNNEofs60aSnQkzVNb_QrnSr8LjAzwifEWQL2LqQYwDD5786DMWsx1QXI-AQcTGwH6Mw2h-EXOxvVH05pqCGvL8BM"
            ],
            technicalNote: "Válvula EGR de recirculación de gases de escape para motores Detroit DD15. Cumple con normativas EPA 2010 y posteriores.",
            specs: [
                { label: "Tipo", value: "Válvula EGR Eléctrica" },
                { label: "Voltaje", value: "12V / 24V" },
                { label: "Material", value: "Acero Inoxidable 304" },
                { label: "Peso", value: "3.2 kg" },
                { label: "Conexión", value: "Eléctrica 6 pines" },
                { label: "Certificación", value: "EPA 2010" }
            ],
            compatibility: [
                { title: "Detroit DD15", desc: "14.8L Inline-6" },
                { title: "Freightliner", desc: "Cascadia 2012+" },
                { title: "Años Modelo", desc: "2012 - 2024" },
                { title: "Potencia", desc: "400-505 HP" }
            ],
            installation: [
                { step: "1", title: "Desconectar", desc: "Desconecte conector eléctrico y desconecte mangueras de gases." },
                { step: "2", title: "Retirar", desc: "Retire 4 pernos de montaje. Limpie superficie de montaje." },
                { step: "3", title: "Instalar", desc: "Use nueva junta. Torque: 15 ft-lbs. Reconecte eléctrico y verifique con scanner." }
            ]
        },
        {
            id: 5,
            name: "Inyector Bosch Common Rail",
            brand: "Bosch",
            sku: "BOS-6701-IN",
            price: 580.00,
            oldPrice: 650.00,
            discount: 11,
            stock: true,
            stockText: "En Stock",
            images: [
                "https://lh3.googleusercontent.com/aida-public/AB6AXuBcq0FTn4sixsza9CVtPOnPKQJov8Ui8XYA3uGRpWC4LDD1Ze8Gg-2xj-O9jKECyJsf6PWKzcAP587qr46eOqqlv0ITwFAOGg9qxHstfdMaVcO13OY1Y43qVQhaQL0N9fEioYTxTcnUjuYC2VZLrFJAgMr_d9gGNwMWkd5tTzJ94ESTCuNWfpLOavRKnF76xuxrOANZKwOUUtEEqpu5exJOvPc5wGxgjew4_6X2fRisUN82VMogfrxsFPZqweCdlMiG8PcxWexovxQ"
            ],
            technicalNote: "Inyector Bosch Common Rail de alta precisión. Presión de inyección hasta 2,500 bar para combustión óptima y bajas emisiones.",
            specs: [
                { label: "Presión Máx.", value: "2,500 bar" },
                { label: "Tipo", value: "Piezoeléctrico" },
                { label: "Conexión", value: "Eléctrica 2 pines" },
                { label: "Peso", value: "0.8 kg" },
                { label: "Caudal", value: "300 cc/30s" },
                { label: "Certificación", value: "Bosch Remanufacturado" }
            ],
            compatibility: [
                { title: "Cummins ISX15", desc: "15L Inline-6" },
                { title: "Kenworth", desc: "T680 / T880" },
                { title: "Años Modelo", desc: "2010 - 2024" },
                { title: "Potencia", desc: "400-600 HP" }
            ],
            installation: [
                { step: "1", title: "Preparar", desc: "Limpie área del inyector. Desconecte línea de combustible y eléctrico." },
                { step: "2", title: "Retirar", desc: "Retire perno de sujeción. Extraiga inyector con herramienta especial." },
                { step: "3", title: "Instalar", desc: "Use nueva arandela de cobre. Torque: 18 ft-lbs. Purgue sistema de combustible." }
            ]
        },
        {
            id: 6,
            name: "Kit de Pistones Cummins N14",
            brand: "Cummins",
            sku: "CUM-PIS-6",
            price: 1150.00,
            oldPrice: null,
            discount: 0,
            stock: true,
            stockText: "En Stock",
            images: [
                "https://lh3.googleusercontent.com/aida-public/AB6AXuCWEohmAw6eWxzZ0isaHUZlU9cOvgrjklSgykQalVfOYZjL7qpFC9-FV6LmS9RIY5UcJfa-IDSmjpStTpdObb10qNTIOJuZpo-VXSDINLYw_NacgWn7-C6XvF7I6UnQoSXSOgNfqitJ1gcjbw5DdAiBmXQX89pAwFe1_5df3bM8k3-weKsaPWlmyLHvLBLkb0ywwgbPXjfB1kWHVmNfCx5gdA5eB-GuYD_aiBMLpQb2oSH1PQdn7qfRneQGFFuTAQUR1gzSjZQ4ahs"
            ],
            technicalNote: "Kit completo de 6 pistones forjados para motor Cummins N14. Incluye anillos, pasadores y seguros. Aleación de aluminio de alta resistencia.",
            specs: [
                { label: "Material", value: "Aleación de Aluminio Forjado" },
                { label: "Diámetro", value: "137mm (Standard)" },
                { label: "Incluye", value: "6 Pistones + Anillos + Pasadores" },
                { label: "Peso Total", value: "18 kg" },
                { label: "Compresión", value: "15.5:1" },
                { label: "Certificación", value: "Cummins Genuine" }
            ],
            compatibility: [
                { title: "Cummins N14", desc: "14L Inline-6" },
                { title: "Aplicaciones", desc: "Camiones / Generadores" },
                { title: "Años Modelo", desc: "1991 - 2001" },
                { title: "Potencia", desc: "315-525 HP" }
            ],
            installation: [
                { step: "1", title: "Desarmar Motor", desc: "Retire culata, cárter y bielas. Extraiga pistones antiguos." },
                { step: "2", title: "Preparar", desc: "Limpie cilindros. Verifique desgaste. Instale anillos en orden correcto." },
                { step: "3", title: "Instalar", desc: "Use compresor de anillos. Torque de bielas: 40 ft-lbs. Verifique holgura." }
            ]
        },
        {
            id: 7,
            name: "Cojinetes de Bancada Perkins",
            brand: "Perkins",
            sku: "PER-BR-50",
            price: 185.00,
            oldPrice: null,
            discount: 0,
            stock: true,
            stockText: "En Stock",
            images: [
                "https://lh3.googleusercontent.com/aida-public/AB6AXuCvii9sNQqqDnze22RTwuNH4tSqUrMSJEXQ_FZFjPwG7dYtpNrQJAq0iwera4ziKWQKtyKYIL3Msi0Ss1lb_0rAdSz18URZSXeNKR778JJHXa9fh-w_0xuxoiVzGWVmi51yNMm5KiF0vGlydUl4uQOHa2rxq6mLGP-mxNA4hDD6OPLg6oq6Bc1XiiwKu8x-iLpFbE2WTYWPtUz4UsWUlPEbLEvWMu82shO_LQJ9o2VuAd2XKqP2YRA3aO_XtOwzJ8hZqiF8RgaCt5U"
            ],
            technicalNote: "Juego completo de cojinetes de bancada para motores Perkins 1100 Series. Material de triple capa con recubrimiento de babbit.",
            specs: [
                { label: "Material", value: "Acero/Babbit/Tri-metal" },
                { label: "Medida", value: "Standard (0.00)" },
                { label: "Incluye", value: "7 Cojinetes (6 biela + 1 thrust)" },
                { label: "Peso", value: "2.5 kg" },
                { label: "Holgura", value: "0.025-0.050mm" },
                { label: "Certificación", value: "Perkins Genuine" }
            ],
            compatibility: [
                { title: "Perkins 1100", desc: "4.4L / 6.6L" },
                { title: "Aplicaciones", desc: "Generadores / Bombas" },
                { title: "Años Modelo", desc: "2000 - 2024" },
                { title: "Potencia", desc: "75-175 HP" }
            ],
            installation: [
                { step: "1", title: "Desarmar", desc: "Retire cárter, bielas y cigüeñal. Limpie bancadas." },
                { step: "2", title: "Verificar", desc: "Mida holgura con plastigage. Verifique desgaste del cigüeñal." },
                { step: "3", title: "Instalar", desc: "Coloque cojinetes con lubricante de montaje. Torque según manual." }
            ]
        },
        {
            id: 8,
            name: "Árbol de Levas Komatsu SAA6D",
            brand: "Komatsu",
            sku: "KOM-CAM-10",
            price: 940.00,
            oldPrice: 1100.00,
            discount: 15,
            stock: true,
            stockText: "En Stock",
            images: [
                "https://lh3.googleusercontent.com/aida-public/AB6AXuAnCBaJGHx-KHBLQMmi3di8svfE3nGssoVmApRyiRUq5UrT_y5Pmr6_1ffSS1IY-q5a5uldF0WDPUwWSd54IKetwTlV9chBnwD3zo5BSzAt6P6ztwcNISdloAaVQmOHdN3yZEDhMG7zUUIvZIckDDA4jU0vV0JDZnPJkVr9QulcoKSKbKqwfuLrXrypbTwNii03VYK3j6peId5g5vf6YclbW5jlhIr8u00SlBVCPvoW_1L0z6FOb_TeDtNKLKbNdpjPqlAEdSaZkXA"
            ],
            technicalNote: "Árbol de levas forjado para motores Komatsu SAA6D125E. Perfil de leva optimizado para máximo rendimiento y durabilidad.",
            specs: [
                { label: "Material", value: "Acero Forjado 4140" },
                { label: "Longitud", value: "850mm" },
                { label: "Lobes", value: "12 (6 admisión + 6 escape)" },
                { label: "Peso", value: "15 kg" },
                { label: "Tratamiento", value: "Cementación y temple" },
                { label: "Certificación", value: "Komatsu Genuine" }
            ],
            compatibility: [
                { title: "Komatsu PC200", desc: "SAA6D125E-3" },
                { title: "Komatsu PC300", desc: "SAA6D125E-5" },
                { title: "Años Modelo", desc: "2005 - 2024" },
                { title: "Potencia", desc: "150-270 HP" }
            ],
            installation: [
                { step: "1", title: "Acceder", desc: "Retire tapa de válvulas y engranajes de distribución." },
                { step: "2", title: "Retirar", desc: "Retire balancines y extractores de leva. Extraiga árbol con cuidado." },
                { step: "3", title: "Instalar", desc: "Lubrique lobes y muñones. Alinee marcas de tiempo. Torque según secuencia." }
            ]
        },
        {
            id: 9,
            name: "Filtro de Aceite Toyota Corolla",
            brand: "Toyota",
            sku: "TOY-COR-18",
            price: 18.50,
            oldPrice: null,
            discount: 0,
            stock: true,
            stockText: "En Stock",
            images: [
                "https://lh3.googleusercontent.com/aida-public/AB6AXuAiuQeey5lmq6st-vJo1TRQIs8oQtq_4Cg3QyJcj3j5bJguRJRMBb8ZSC_EXi5lrwaP7iFhysnzJ-1xPxNGrK4UF7AT2OeN8ElIvXkr9-fKhD32L0ADYy9Ey15LiRkDN8mJeDuWdAW5rDzkxw-EYW2ydO_BYYgkeF9JIGC8kwEVf-n5FRVlF_rtG7bTZ9VsR_-6AslLZLeyVYNZWjszYl7HOoO_0ZWqNEcN2WLJnxoqR8dzy5OKZhKk8pdLOhI6kvQ7oAHsQ2gQeQ"
            ],
            technicalNote: "Filtro de aceite original Toyota para Corolla 2018-2024. Filtración de partículas hasta 25 micrones con válvula anti-retorno.",
            specs: [
                { label: "Tipo", value: "Spin-On" },
                { label: "Eficiencia", value: "98% a 25 micrones" },
                { label: "Presión Máx.", value: "120 PSI" },
                { label: "Diámetro", value: "76mm" },
                { label: "Altura", value: "85mm" },
                { label: "Certificación", value: "Toyota Genuine" }
            ],
            compatibility: [
                { title: "Toyota Corolla", desc: "1.8L / 2.0L" },
                { title: "Toyota Camry", desc: "2.5L" },
                { title: "Años Modelo", desc: "2018 - 2024" },
                { title: "Motor", desc: "2ZR-FAE / M20A" }
            ],
            installation: [
                { step: "1", title: "Drenar", desc: "Drene el aceite del motor completamente." },
                { step: "2", title: "Retirar", desc: "Use llave de filtro para retirar el antiguo en sentido antihorario." },
                { step: "3", title: "Instalar", desc: "Lubrique junta con aceite nuevo. Instale a mano + 3/4 vuelta." }
            ]
        },
        {
            id: 10,
            name: "Kit Discos de Freno Toyota Hilux",
            brand: "Toyota",
            sku: "TOY-HIL-22",
            price: 125.00,
            oldPrice: 150.00,
            discount: 17,
            stock: true,
            stockText: "En Stock",
            images: [
                "https://lh3.googleusercontent.com/aida-public/AB6AXuCNjAH9S_Dx8VtU7mF1yl1gIoO1HHxRUQR20jPWmEZ_fWPK0Lf-aqaHg5SbId7ALpHlPm1IBVe6hQPm83-NLF_KRSd1NILUJYVRLn7UO6bSjWbJHrwIEjbFqo-DEe4gv3JFYAtDUXn6VNxmvX1mo4hAlQY5e3qx9t69T02-YM-fgbgyu5g29n1SbpBH5IfDiboMUFBwLW5HUBLf0gL-uFhYCkYCmLrNxaXuJfXidw71gc1TWNKpa50EjrPRsAU9-GWS_sIc880L1A"
            ],
            technicalNote: "Kit de 2 discos de freno ventilados para Toyota Hilux 2020-2024. Hierro fundido de alta calidad con tratamiento anti-corrosión.",
            specs: [
                { label: "Material", value: "Hierro Fundido G3000" },
                { label: "Diámetro", value: "296mm" },
                { label: "Espesor", value: "28mm (nuevo)" },
                { label: "Tipo", value: "Ventilado" },
                { label: "Peso", value: "7.5 kg c/u" },
                { label: "Certificación", value: "ECE R90" }
            ],
            compatibility: [
                { title: "Toyota Hilux", desc: "2.4L / 2.8L Diesel" },
                { title: "Toyota Fortuner", desc: "2.8L Diesel" },
                { title: "Años Modelo", desc: "2020 - 2024" },
                { title: "Eje", desc: "Delantero" }
            ],
            installation: [
                { step: "1", title: "Desmontar", desc: "Retire rueda, pinza y disco antiguo." },
                { step: "2", title: "Limpiar", desc: "Limpie cubo y aplique grasa anti-seize en superficie de contacto." },
                { step: "3", title: "Instalar", desc: "Monte disco nuevo. Reinstale pinza con pastillas nuevas. Sangre si es necesario." }
            ]
        },
        {
            id: 11,
            name: "Bujías Encendido Toyota Corolla",
            brand: "Toyota",
            sku: "TOY-SPK-04",
            price: 32.00,
            oldPrice: null,
            discount: 0,
            stock: true,
            stockText: "En Stock",
            images: [
                "https://lh3.googleusercontent.com/aida-public/AB6AXuDHtNySrP8HrGI66TLOsvDPkaDg0OsqNHGb13gCFvCGw0QIBbKbi8njt_UPgaMng-OmtqIcDmx0wAhZUrdUXCmDeFIZM1XG2w7u_7l-k80z1giO2h8A-I1XxRLmt3-W6Idk23flMeIDf660-0qi_Dc3Uczsjnu_ZMz4jIfiTbyh7AkLSoXLrM58e4ggXYxH_nVG2JNEMfP0fVELVbhRLEirDlLmeSZR96Sd4mKGltM7moFTxvlb8IZZgiNy_dX4rJRNFQjnr-pwkw"
            ],
            technicalNote: "Set de 4 bujías de iridio para Toyota Corolla 1.8L. Mayor durabilidad y mejor combustión vs bujías convencionales.",
            specs: [
                { label: "Tipo", value: "Iridio" },
                { label: "Cantidad", value: "4 unidades" },
                { label: "Electrodo", value: "0.4mm Iridio" },
                { label: "Gap", value: "1.1mm" },
                { label: "Hex", value: "16mm" },
                { label: "Duración", value: "100,000 km" }
            ],
            compatibility: [
                { title: "Toyota Corolla", desc: "1.8L 2ZR-FAE" },
                { title: "Toyota RAV4", desc: "2.5L" },
                { title: "Años Modelo", desc: "2014 - 2024" },
                { title: "Encendido", desc: "Bobina directa" }
            ],
            installation: [
                { step: "1", title: "Acceder", desc: "Retire cubierta de motor y bobinas de encendido." },
                { step: "2", title: "Retirar", desc: "Use llave de bujía 16mm. Extraiga bujías antiguas." },
                { step: "3", title: "Instalar", desc: "Verifique gap. Instale a mano primero, luego torque: 18 ft-lbs." }
            ]
        },
        {
            id: 12,
            name: "Filtro de Aire Toyota Corolla",
            brand: "Toyota",
            sku: "TOY-AIR-19",
            price: 24.00,
            oldPrice: null,
            discount: 0,
            stock: true,
            stockText: "En Stock",
            images: [
                "https://lh3.googleusercontent.com/aida-public/AB6AXuBIn0RkeL7SWo_eG05JQuzVMLn7doFBFF7OpIHfDkWl6wZNAvi_1ZRIdJaIVb7a4iDU4D_xMPMwP1PwALo5h5Ne8BeQ6IYJyR5Toi0SScObpCgrDYb9pJcmIDEu8LMBWvn4ErCt93id7lunEM7-qeA4b_9GAXvUPZ4R2NbJ2iwlpFpnmQqi9yDn3DX6RtOLX6S_nes72O7ZOPAzaUA_laYrmrxqNDUBi9HF74lajrW3XH8c3vNOglhQV_mA3b7yPUnw_7OzGx-fL4k"
            ],
            technicalNote: "Filtro de aire de panel para Toyota Corolla 2019-2024. Media de celulosa de alta eficiencia para máxima protección del motor.",
            specs: [
                { label: "Tipo", value: "Panel" },
                { label: "Material", value: "Celulosa/Poliéster" },
                { label: "Eficiencia", value: "99% a 50 micrones" },
                { label: "Dimensiones", value: "280 x 180 x 45mm" },
                { label: "Peso", value: "0.3 kg" },
                { label: "Certificación", value: "ISO 5011" }
            ],
            compatibility: [
                { title: "Toyota Corolla", desc: "1.8L / 2.0L" },
                { title: "Toyota C-HR", desc: "2.0L" },
                { title: "Años Modelo", desc: "2019 - 2024" },
                { title: "Motor", desc: "2ZR-FAE / M20A" }
            ],
            installation: [
                { step: "1", title: "Abrir Caja", desc: "Desabroche clips de la caja del filtro de aire." },
                { step: "2", title: "Retirar", desc: "Retire filtro antiguo y limpie interior de la caja." },
                { step: "3", title: "Instalar", desc: "Coloque filtro nuevo con flechas hacia arriba. Cierre clips." }
            ]
        }
    ];

    // ==================== FUNCIONES ====================
    let currentProduct = null;

    function getProductFromURL() {
        const params = new URLSearchParams(window.location.search);
        const id = parseInt(params.get('id')) || 1;
        return productsDB.find(p => p.id === id) || productsDB[0];
    }

    function renderProduct(product) {
        currentProduct = product;
        
        // Update title
        document.getElementById('pageTitle').textContent = product.name + ' | LA CIMA';
        
        // Update breadcrumb
        document.getElementById('breadcrumbBrand').textContent = product.brand;
        document.getElementById('breadcrumbProduct').textContent = product.name;
        
        // Update brand badge
        document.getElementById('productBrand').textContent = product.brand.toUpperCase();
        
        // Update title
        document.getElementById('productTitle').textContent = product.name;
        
        // Update SKU
        document.getElementById('productSKU').textContent = 'SKU: #' + product.sku;
        
        // Update stock
        document.getElementById('stockStatus').textContent = product.stockText;
        
        // Update price
        document.getElementById('productPrice').textContent = '$' + product.price.toFixed(2);
        
        const oldPriceEl = document.getElementById('productOldPrice');
        const discountEl = document.getElementById('productDiscount');
        const discountBadge = document.getElementById('discountBadge');
        
        if (product.oldPrice) {
            oldPriceEl.textContent = '$' + product.oldPrice.toFixed(2);
            oldPriceEl.classList.remove('hidden');
            discountEl.textContent = '-' + product.discount + '%';
            discountEl.classList.remove('hidden');
            discountBadge.textContent = '-' + product.discount + '% OFF';
            discountBadge.classList.remove('hidden');
        } else {
            oldPriceEl.classList.add('hidden');
            discountEl.classList.add('hidden');
            discountBadge.classList.add('hidden');
        }
        
        // Update Bs price
        document.getElementById('productPriceBs').textContent = 'Bs. ' + (product.price * 36).toFixed(2) + ' aprox. | IVA incluido';
        
        // Update main image
        document.getElementById('mainImage').src = product.images[0];
        document.getElementById('mainImage').alt = product.name;
        
        // Update thumbnails
        const thumbsContainer = document.getElementById('thumbnails');
        thumbsContainer.innerHTML = product.images.map((img, i) => `
            <button onclick="changeImage(this)" class="${i === 0 ? 'thumb-active' : 'opacity-60'} aspect-square bg-white border-2 ${i === 0 ? 'border-primary' : 'border-outline'} rounded-xl p-2 overflow-hidden flex items-center justify-center hover:border-primary transition-all">
                <img src="${img}" class="w-full h-full object-contain mix-blend-multiply">
            </button>
        `).join('') + `<button onclick="handle360View()" class="aspect-square bg-stone-100 border-2 border-outline rounded-xl flex items-center justify-center text-on-surface-variant hover:text-black hover:border-primary transition-colors cursor-pointer"><span class="material-symbols-outlined text-3xl">360</span></button>`;
        
        // Update technical note
        document.getElementById('technicalNoteText').textContent = product.technicalNote;
        
        // Update specs table
        document.getElementById('specsTable').innerHTML = '<table class="w-full"><tbody class="text-xs font-black uppercase tracking-widest">' +
            product.specs.map((s, i) => `<tr class="bg-white border-b border-outline hover:bg-background transition-colors"><td class="px-8 py-5 text-on-surface-variant bg-background w-1/3">${s.label}</td><td class="px-8 py-5 text-black">${s.value}</td></tr>`).join('') +
            '</tbody></table>';
        
        // Update compatibility
        document.getElementById('compatibilityGrid').innerHTML = product.compatibility.map(c => `
            <div class="p-6 border-l-4 border-primary bg-white rounded-r-xl shadow-sm hover:shadow-md transition-shadow">
                <p class="text-on-surface-variant mb-2 text-[10px] font-bold uppercase tracking-widest">${c.title}</p>
                <p class="text-black text-sm font-bold">${c.desc}</p>
            </div>
        `).join('');
        
        // Update installation
        document.getElementById('installationSteps').innerHTML = product.installation.map(s => `
            <div class="flex gap-4">
                <div class="w-10 h-10 bg-primary rounded-full flex items-center justify-center flex-shrink-0 text-black font-black">${s.step}</div>
                <div>
                    <h4 class="font-black uppercase text-sm mb-1">${s.title}</h4>
                    <p class="text-xs text-on-surface-variant font-medium leading-relaxed">${s.desc}</p>
                </div>
            </div>
        `).join('');
        
        // Update related products (show 4 random products excluding current)
        const related = productsDB.filter(p => p.id !== product.id).sort(() => Math.random() - 0.5).slice(0, 4);
        document.getElementById('relatedProducts').innerHTML = related.map(p => `
            <a href="detalle_productos.html?id=${p.id}" class="group bg-white border border-outline rounded-2xl overflow-hidden hover:shadow-xl transition-all block">
                <div class="relative aspect-square bg-stone-50 overflow-hidden">
                    <img src="${p.images[0]}" class="w-full h-full object-contain mix-blend-multiply group-hover:scale-110 transition-transform duration-500 p-8">
                </div>
                <div class="p-6">
                    <p class="text-[10px] font-bold text-stone-400 uppercase mb-1">${p.brand} / ${p.sku}</p>
                    <h4 class="font-bold text-sm text-black mb-3 line-clamp-1">${p.name}</h4>
                    <div class="flex items-center justify-between">
                        <span class="text-xl font-black text-black">$${p.price.toFixed(2)}</span>
                        <button class="w-10 h-10 bg-black text-white rounded-lg flex items-center justify-center hover:bg-primary hover:text-black transition-colors">
                            <span class="material-symbols-outlined text-sm">add_shopping_cart</span>
                        </button>
                    </div>
                </div>
            </a>
        `).join('');
    }

    function changeImage(thumb) {
        const mainImg = document.getElementById('mainImage');
        const thumbImg = thumb.querySelector('img');
        if (thumbImg) {
            mainImg.src = thumbImg.src;
        }
        document.querySelectorAll('#thumbnails button').forEach(t => {
            t.classList.remove('thumb-active');
            t.classList.add('opacity-60');
            t.classList.remove('border-primary');
            t.classList.add('border-outline');
        });
        thumb.classList.add('thumb-active');
        thumb.classList.remove('opacity-60');
        thumb.classList.remove('border-outline');
        thumb.classList.add('border-primary');
    }

    function updateQty(change) {
        const input = document.getElementById('qtyInput');
        let val = parseInt(input.value) || 1;
        val = Math.max(1, Math.min(99, val + change));
        input.value = val;
    }

    function switchTab(tabId) {
        document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));
        document.querySelectorAll('.tab-btn').forEach(b => {
            b.classList.remove('border-primary', 'text-black');
            b.classList.add('border-transparent', 'text-on-surface-variant');
        });
        document.getElementById('content-' + tabId).classList.add('active');
        const btn = document.getElementById('tab-' + tabId);
        btn.classList.add('border-primary', 'text-black');
        btn.classList.remove('border-transparent', 'text-on-surface-variant');
    }

    function getCart() { return JSON.parse(localStorage.getItem('cart')) || []; }
    function saveCart(cart) { localStorage.setItem('cart', JSON.stringify(cart)); }
    
    function updateCartCount() {
        const cart = getCart();
        const count = cart.reduce((sum, item) => sum + item.qty, 0);
        const badge = document.getElementById('cart-count');
        if (badge) { badge.textContent = count; badge.style.display = count > 0 ? 'flex' : 'none'; }
    }
    
    function addToCartFromDetail() {
        if (!currentProduct) return;
        const qty = parseInt(document.getElementById('qtyInput').value) || 1;
        let cart = getCart();
        const existing = cart.find(item => item.id === currentProduct.id);
        
        if (existing) { existing.qty += qty; }
        else {
            cart.push({
                id: currentProduct.id,
                name: currentProduct.name,
                price: currentProduct.price,
                image: currentProduct.images[0],
                ref: currentProduct.brand + ' / ' + currentProduct.sku,
                qty: qty
            });
        }
        
        saveCart(cart);
        updateCartCount();
        
        const notification = document.createElement('div');
        notification.className = 'fixed top-24 right-6 bg-black text-white px-6 py-4 rounded-lg shadow-2xl z-50 flex items-center gap-3';
        notification.innerHTML = '<span class="material-symbols-outlined text-primary">check_circle</span><span class="text-sm font-bold">Producto agregado al carrito</span>';
        document.body.appendChild(notification);
        setTimeout(() => { notification.style.opacity = '0'; notification.style.transition = 'opacity 0.3s'; setTimeout(() => notification.remove(), 300); }, 2000);
    }

    function openMobileMenu() {
        document.getElementById('mobileMenu').classList.remove('hidden');
        document.getElementById('mobileNav').classList.remove('-translate-x-full');
        document.getElementById('mobileNav').classList.add('open');
        document.body.style.overflow = 'hidden';
    }
    function closeMobileMenu() {
        document.getElementById('mobileMenu').classList.add('hidden');
        document.getElementById('mobileNav').classList.add('-translate-x-full');
        document.getElementById('mobileNav').classList.remove('open');
        document.body.style.overflow = '';
    }

    const scrollTopBtn = document.getElementById('scrollTopBtn');
    window.addEventListener('scroll', function() {
        if (window.scrollY > 500) scrollTopBtn.classList.remove('hidden');
        else scrollTopBtn.classList.add('hidden');
    });

    const searchInput = document.getElementById('searchInput');
    if (searchInput) {
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter' && this.value.trim()) {
                window.location.href = 'catalogo_detallado.html?q=' + encodeURIComponent(this.value.trim());
            }
        });
    }

    if ('serviceWorker' in navigator) {
        window.addEventListener('load', () => {
            navigator.serviceWorker.register('../service-worker.js').catch(() => {});
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        const product = getProductFromURL();
        renderProduct(product);
        updateCartCount();
        checkFavorite(product.id);
    });

    // ==================== FAVORITES ====================
    function toggleFavorite() {
        if (!currentProduct) return;
        let favorites = JSON.parse(localStorage.getItem('favorites') || '[]');
        const index = favorites.indexOf(currentProduct.id);
        const icon = document.getElementById('favoriteIcon');
        if (index > -1) {
            favorites.splice(index, 1);
            icon.textContent = 'favorite_border';
            showNotification('Eliminado de favoritos');
        } else {
            favorites.push(currentProduct.id);
            icon.textContent = 'favorite';
            showNotification('Agregado a favoritos');
        }
        localStorage.setItem('favorites', JSON.stringify(favorites));
    }

    function checkFavorite(productId) {
        const favorites = JSON.parse(localStorage.getItem('favorites') || '[]');
        const icon = document.getElementById('favoriteIcon');
        if (favorites.includes(productId)) {
            icon.textContent = 'favorite';
        }
    }

    // ==================== 360 VIEW ====================
    function handle360View() {
        showNotification('Vista 360 disponible próximamente');
    }

    // ==================== NOTIFICATIONS ====================
    function showNotification(message) {
        const notification = document.createElement('div');
        notification.className = 'fixed top-24 right-6 bg-black text-white px-6 py-4 rounded-lg shadow-2xl z-50 flex items-center gap-3';
        notification.innerHTML = '<span class="material-symbols-outlined text-primary">info</span><span class="text-sm font-bold">' + message + '</span>';
        document.body.appendChild(notification);
        setTimeout(() => {
            notification.style.opacity = '0';
            notification.style.transition = 'opacity 0.3s';
            setTimeout(() => notification.remove(), 300);
        }, 2000);
    }