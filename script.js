function info(jenis) {

    let judul = document.getElementById("judul");
    let isi = document.getElementById("isi");


    if (jenis == "karang") {

        judul.innerHTML = "Terumbu Karang";

        isi.innerHTML = `
            <b>Pengertian:</b><br>
            Terumbu karang merupakan ekosistem laut yang tersusun
            dari koloni hewan karang dan berbagai organisme laut.
            Ekosistem ini umumnya ditemukan di perairan yang dangkal,
            jernih, dan mendapatkan cahaya matahari yang cukup.
            <br><br>

            <b>Salinitas:</b><br>
            Terumbu karang umumnya hidup pada perairan dengan
            salinitas sekitar <b>30–40‰</b>. Salinitas yang relatif
            stabil diperlukan untuk mendukung pertumbuhan dan
            kehidupan karang.
            <br><br>

            <b>Ciri-ciri:</b><br>
            Memiliki struktur keras yang terbentuk dari kalsium
            karbonat. Perairannya biasanya jernih dan memiliki
            penetrasi cahaya yang baik.
            <br><br>

            <b>Organisme yang hidup di dalamnya:</b><br>
            Ikan, moluska, krustasea, spons, alga, bintang laut,
            dan berbagai organisme laut lainnya.
            <br><br>

            <b>Manfaat:</b><br>
            Menjadi tempat berlindung, mencari makan, dan berkembang
            biak bagi organisme laut. Terumbu karang juga membantu
            mengurangi energi gelombang yang menuju pantai.
            <br><br>

            <b>Ancaman:</b><br>
            Pencemaran, sedimentasi, penangkapan ikan yang merusak,
            aktivitas manusia yang tidak ramah lingkungan, serta
            perubahan kondisi lingkungan laut.
        `;

    }

    else if (jenis == "mangrove") {

        judul.innerHTML = "Mangrove";

        isi.innerHTML = `
            <b>Pengertian:</b><br>
            Mangrove merupakan ekosistem pesisir yang tersusun dari
            tumbuhan yang mampu hidup pada wilayah yang dipengaruhi
            oleh pasang dan surut air laut. Mangrove dapat ditemukan
            di pantai, muara sungai, laguna, dan wilayah pesisir
            yang terlindung.
            <br><br>

            <b>Salinitas:</b><br>
            Mangrove dapat hidup pada kondisi salinitas yang cukup
            beragam, yaitu sekitar <b>0–35‰</b>. Kondisi salinitas
            bergantung pada pengaruh air tawar dan air laut. Beberapa
            jenis mangrove juga memiliki kemampuan beradaptasi pada
            salinitas yang lebih tinggi.
            <br><br>

            <b>Ciri-ciri:</b><br>
            Memiliki kemampuan beradaptasi terhadap air asin,
            tanah berlumpur, genangan air, dan perubahan pasang
            surut. Beberapa jenis mangrove memiliki akar yang
            muncul di atas permukaan tanah.
            <br><br>

            <b>Organisme yang hidup di dalamnya:</b><br>
            Ikan, kepiting, udang, moluska, burung, dan berbagai
            organisme pesisir lainnya.
            <br><br>

            <b>Manfaat:</b><br>
            Membantu melindungi garis pantai, menahan sedimen,
            mengurangi energi gelombang, serta menyediakan tempat
            berlindung dan mencari makan bagi organisme pesisir.
            <br><br>

            <b>Ancaman:</b><br>
            Penebangan, perubahan penggunaan lahan, pencemaran,
            pembangunan wilayah pesisir, dan aktivitas manusia
            yang tidak memperhatikan lingkungan.
        `;

    }

    else if (jenis == "lamun") {

        judul.innerHTML = "Padang Lamun";

        isi.innerHTML = `
            <b>Pengertian:</b><br>
            Padang lamun merupakan ekosistem laut yang tersusun
            dari tumbuhan lamun yang hidup dan berkembang di dalam
            air laut. Lamun merupakan tumbuhan berbunga yang memiliki
            akar, batang, dan daun.
            <br><br>

            <b>Salinitas:</b><br>
            Padang lamun umumnya berkembang pada perairan dengan
            salinitas sekitar <b>25–35‰</b>. Setiap jenis lamun
            memiliki toleransi salinitas yang berbeda. Salinitas
            juga dapat berubah karena pengaruh air tawar, hujan,
            dan pasang surut.
            <br><br>

            <b>Ciri-ciri:</b><br>
            Umumnya ditemukan di perairan dangkal yang masih
            mendapatkan cahaya matahari. Lamun dapat tumbuh pada
            dasar perairan berpasir maupun berlumpur dan membentuk
            hamparan yang disebut padang lamun.
            <br><br>

            <b>Organisme yang hidup di dalamnya:</b><br>
            Ikan, kepiting, udang, moluska, penyu, dan berbagai
            organisme laut lainnya.
            <br><br>

            <b>Manfaat:</b><br>
            Menjadi tempat berlindung, mencari makan, dan berkembang
            biak bagi berbagai organisme. Akar dan rimpang lamun
            juga membantu menstabilkan sedimen di dasar perairan.
            <br><br>

            <b>Ancaman:</b><br>
            Pencemaran, sedimentasi berlebihan, aktivitas kapal,
            pembangunan pesisir, dan kerusakan fisik pada dasar
            perairan.
        `;

    }

}