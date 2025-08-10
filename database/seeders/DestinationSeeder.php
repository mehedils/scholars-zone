<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Destination;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $destinations = [
            [
                'name' => 'Canada',
                'short_description' => 'World-class education with affordable tuition fees and excellent post-graduation work opportunities.',
                'content' => '<h2>Why Study in Canada?</h2>
<p>Canada is one of the most popular study destinations for international students, offering world-class education, multicultural environment, and excellent quality of life. With over 100 universities and colleges, Canada provides diverse academic programs and research opportunities.</p>

<h3>Education System</h3>
<p>Canada\'s education system is known for its high quality and innovation. Universities offer undergraduate, graduate, and doctoral programs across various disciplines. The country is particularly strong in fields like engineering, computer science, business, and healthcare.</p>

<h3>Cost of Education</h3>
<p>Compared to other popular study destinations like the USA and UK, Canada offers more affordable tuition fees. International students can expect to pay between CAD 20,000 to CAD 30,000 per year for undergraduate programs.</p>

<h3>Work Opportunities</h3>
<p>Canada provides excellent post-graduation work opportunities through the Post-Graduation Work Permit (PGWP) program, allowing students to work for up to 3 years after completing their studies.</p>',
                'region' => 'North America',
                'capital' => 'Ottawa',
                'currency' => 'CAD',
                'language' => 'English, French',
                'average_tuition_fee' => 25000.00,
                'average_living_cost' => 15000.00,
                'universities_count' => 15,
                'programs_count' => 120,
                'highlights' => [
                    'Post-graduation work permit up to 3 years',
                    'Pathway to permanent residence',
                    'Affordable tuition compared to USA/UK',
                    'Welcoming multicultural society',
                    'High quality of life',
                    'Safe and peaceful environment'
                ],
                'requirements' => [
                    'Valid passport',
                    'Letter of acceptance from a Canadian institution',
                    'Proof of financial support',
                    'English/French language proficiency',
                    'Medical examination',
                    'Criminal background check'
                ],
                'benefits' => [
                    'Access to universal healthcare',
                    'Part-time work opportunities',
                    'Diverse cultural experience',
                    'Strong economy and job market',
                    'Beautiful natural landscapes',
                    'High standard of living'
                ],
                'is_featured' => true,
                'is_active' => true,
                'order' => 1,
                'meta_title' => 'Study in Canada - World-Class Education & Work Opportunities',
                'meta_description' => 'Discover why Canada is a top study destination with affordable tuition, post-graduation work permits, and pathway to permanent residence.'
            ],
            [
                'name' => 'Germany',
                'short_description' => 'European excellence in education with affordable tuition and strong industry connections.',
                'content' => '<h2>Why Study in Germany?</h2>
<p>Germany is renowned for its excellent education system, particularly in engineering, technology, and research. Many universities offer programs in English, making it accessible to international students.</p>

<h3>Education System</h3>
<p>German universities are known for their research-oriented approach and strong industry connections. The country offers both traditional universities and universities of applied sciences (Fachhochschulen).</p>

<h3>Cost of Education</h3>
<p>Most public universities in Germany charge minimal or no tuition fees for international students. Students only need to pay a small semester contribution of around €150-300.</p>

<h3>Work Opportunities</h3>
<p>Germany offers excellent job opportunities for graduates, especially in engineering, IT, and manufacturing sectors. The country has a strong economy and is home to many multinational companies.</p>',
                'region' => 'Europe',
                'capital' => 'Berlin',
                'currency' => 'EUR',
                'language' => 'German',
                'average_tuition_fee' => 500.00,
                'average_living_cost' => 12000.00,
                'universities_count' => 12,
                'programs_count' => 95,
                'highlights' => [
                    'Low or no tuition fees',
                    'Strong engineering programs',
                    'Excellent research opportunities',
                    'Strong economy',
                    'Central European location',
                    'Rich cultural heritage'
                ],
                'requirements' => [
                    'Valid passport',
                    'University admission letter',
                    'Proof of financial resources',
                    'German language proficiency (for German programs)',
                    'Health insurance',
                    'Visa application'
                ],
                'benefits' => [
                    'Affordable education',
                    'High-quality research facilities',
                    'Strong industry connections',
                    'Excellent public transportation',
                    'Rich cultural experience',
                    'Access to Schengen area'
                ],
                'is_featured' => true,
                'is_active' => true,
                'order' => 2,
                'meta_title' => 'Study in Germany - Affordable Education & Engineering Excellence',
                'meta_description' => 'Study in Germany with low tuition fees, excellent engineering programs, and strong industry connections.'
            ],
            [
                'name' => 'Australia',
                'short_description' => 'Land down under offering quality education and amazing lifestyle opportunities.',
                'content' => '<h2>Why Study in Australia?</h2>
<p>Australia is known for its high-quality education system, beautiful landscapes, and excellent lifestyle. The country offers a perfect blend of academic excellence and outdoor adventure.</p>

<h3>Education System</h3>
<p>Australian universities are globally recognized and offer innovative teaching methods. The country is particularly strong in fields like environmental science, marine biology, and business.</p>

<h3>Cost of Education</h3>
<p>Tuition fees in Australia range from AUD 20,000 to AUD 45,000 per year, depending on the program and institution. Living costs are moderate compared to other developed countries.</p>

<h3>Work Opportunities</h3>
<p>Australia offers post-study work visas and has a strong job market, especially in sectors like healthcare, engineering, and IT.</p>',
                'region' => 'Australia',
                'capital' => 'Canberra',
                'currency' => 'AUD',
                'language' => 'English',
                'average_tuition_fee' => 35000.00,
                'average_living_cost' => 18000.00,
                'universities_count' => 8,
                'programs_count' => 75,
                'highlights' => [
                    'High-quality education',
                    'Beautiful natural landscapes',
                    'Excellent lifestyle',
                    'Post-study work opportunities',
                    'Multicultural society',
                    'Safe environment'
                ],
                'requirements' => [
                    'Valid passport',
                    'University offer letter',
                    'Proof of financial capacity',
                    'English language proficiency',
                    'Health insurance',
                    'Student visa'
                ],
                'benefits' => [
                    'Globally recognized degrees',
                    'Excellent research facilities',
                    'Beautiful weather and beaches',
                    'Strong economy',
                    'Friendly people',
                    'Unique wildlife and nature'
                ],
                'is_featured' => true,
                'is_active' => true,
                'order' => 3,
                'meta_title' => 'Study in Australia - Quality Education & Amazing Lifestyle',
                'meta_description' => 'Experience quality education in Australia with beautiful landscapes and excellent lifestyle opportunities.'
            ],
            [
                'name' => 'United Kingdom',
                'short_description' => 'Historic universities with modern facilities and global recognition.',
                'content' => '<h2>Why Study in the UK?</h2>
<p>The UK is home to some of the world\'s oldest and most prestigious universities, offering excellent education and research opportunities across all disciplines.</p>

<h3>Education System</h3>
<p>UK universities are known for their academic excellence and research output. The country offers a wide range of programs from traditional arts to cutting-edge technology.</p>

<h3>Cost of Education</h3>
<p>Tuition fees in the UK range from £10,000 to £35,000 per year for international students, depending on the program and institution.</p>

<h3>Work Opportunities</h3>
<p>The UK offers various post-study work options and has a strong job market, particularly in finance, technology, and creative industries.</p>',
                'region' => 'Europe',
                'capital' => 'London',
                'currency' => 'GBP',
                'language' => 'English',
                'average_tuition_fee' => 25000.00,
                'average_living_cost' => 20000.00,
                'universities_count' => 20,
                'programs_count' => 150,
                'highlights' => [
                    'World-renowned universities',
                    'Rich cultural heritage',
                    'Global business hub',
                    'Excellent research facilities',
                    'Diverse student community',
                    'Historic cities'
                ],
                'requirements' => [
                    'Valid passport',
                    'University acceptance letter',
                    'Proof of financial support',
                    'English language proficiency',
                    'Health insurance',
                    'Student visa'
                ],
                'benefits' => [
                    'Prestigious degrees',
                    'Strong alumni networks',
                    'Cultural diversity',
                    'Excellent career prospects',
                    'Rich history and culture',
                    'Access to Europe'
                ],
                'is_featured' => true,
                'is_active' => true,
                'order' => 4,
                'meta_title' => 'Study in the UK - Prestigious Universities & Global Recognition',
                'meta_description' => 'Study at prestigious UK universities with global recognition and excellent career prospects.'
            ],
            [
                'name' => 'Netherlands',
                'short_description' => 'Innovative education system with English-taught programs and international focus.',
                'content' => '<h2>Why Study in the Netherlands?</h2>
<p>The Netherlands is known for its innovative education system, international outlook, and high quality of life. Many programs are taught in English, making it accessible to international students.</p>

<h3>Education System</h3>
<p>Dutch universities are known for their practical approach to education and strong international focus. The country offers excellent programs in business, engineering, and social sciences.</p>

<h3>Cost of Education</h3>
<p>Tuition fees for international students range from €6,000 to €15,000 per year, which is relatively affordable compared to other European countries.</p>

<h3>Work Opportunities</h3>
<p>The Netherlands has a strong economy and offers excellent job opportunities, particularly in technology, logistics, and international business.</p>',
                'region' => 'Europe',
                'capital' => 'Amsterdam',
                'currency' => 'EUR',
                'language' => 'Dutch, English',
                'average_tuition_fee' => 10000.00,
                'average_living_cost' => 12000.00,
                'universities_count' => 10,
                'programs_count' => 85,
                'highlights' => [
                    'English-taught programs',
                    'Innovative education',
                    'International environment',
                    'High quality of life',
                    'Excellent infrastructure',
                    'Liberal society'
                ],
                'requirements' => [
                    'Valid passport',
                    'University admission',
                    'Proof of financial means',
                    'English language proficiency',
                    'Health insurance',
                    'Residence permit'
                ],
                'benefits' => [
                    'International perspective',
                    'Strong business environment',
                    'Excellent public transport',
                    'Beautiful cities',
                    'Progressive society',
                    'Access to European market'
                ],
                'is_featured' => true,
                'is_active' => true,
                'order' => 5,
                'meta_title' => 'Study in the Netherlands - Innovative Education & International Focus',
                'meta_description' => 'Experience innovative education in the Netherlands with English-taught programs and international focus.'
            ]
        ];

        foreach ($destinations as $destinationData) {
            Destination::updateOrCreate(
                ['name' => $destinationData['name']],
                $destinationData
            );
        }
    }
}
