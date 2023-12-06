<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Month;
use Illuminate\Database\Seeder;
use App\Models\ScholarshipStudent;
use App\Models\ScholarshipCategory;
use App\Models\ScholarshipPaymentTransaction;
use App\Models\ScholarshipPaymentTransactionDetail;
use App\Models\ScholarshipPaymentTransactionRevise;
use App\Models\ScholarshipPaymentTransactionAttachment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ScholarshipPaymentTransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $yearlyBudgetId = 1;
        $scholarshipStudents = ScholarshipStudent::all();
        $months = Month::all();
        $scholarshipCategories = ScholarshipCategory::all();
        foreach($scholarshipStudents as $scholarshipStudent){
            $user = User::find($scholarshipStudent->user_id);
            foreach ($months as $month){
                foreach ($scholarshipCategories as $scholarshipCategory){
                    $scholarshipPaymentTransaction = ScholarshipPaymentTransaction::create([
                        'user_id' => $user->id,
                        'yearly_budget_id' => $yearlyBudgetId,
                        'scholarship_category_id' => $scholarshipCategory->id,
                        'month_id' => $month->id,
                        'cost' => 0,
                        'payment_cost' => 0,
                    ]);

                    ScholarshipPaymentTransactionDetail::create([
                        'scholarship_payment_transaction_id' => $scholarshipPaymentTransaction->id
                    ]);
                }
            }
        }
        ScholarshipPaymentTransaction::find(142)->update([
            'cost' => 3000,
            'payment_cost' => 3000,
            'status' => 3
        ]);
        ScholarshipPaymentTransaction::find(143)->update([
            'cost' => 7000,
            'payment_cost' => 5000,
            'status' => 3
        ]);
        ScholarshipPaymentTransaction::find(94)->update([
            'cost' => 2000,
            'payment_cost' => 2000,
            'status' => 3
        ]);
        ScholarshipPaymentTransaction::find(47)->update([
            'cost' => 6000,
            'payment_cost' => 5000,
            'status' => 3
        ]);
        ScholarshipPaymentTransaction::find(46)->update([
            'cost' => 5000,
            'payment_cost' => 5000,
            'status' => 3
        ]);
        
        ScholarshipPaymentTransaction::find(96)->update([
            'cost' => 5000,
            'payment_cost' => 5000,
            'status' => 2
        ]);

        ScholarshipPaymentTransaction::find(95)->update([
            'cost' => 5000,
            'payment_cost' => 4500,
            'status' => 2
        ]);

        ScholarshipPaymentTransaction::find(144)->update([
            'cost' => 5000,
            'payment_cost' => 5000,
            'status' => 2
        ]);

        ScholarshipPaymentTransaction::find(48)->update([
            'cost' => 5000,
            'payment_cost' => 0,
            'status' => 4
        ]);

        ScholarshipPaymentTransactionDetail::where('scholarship_payment_transaction_id',142)->first()->update([
            'description' => 'เบิกจ่ายค่าอุปกรณ์การเรียน สำหรับ นายมงคล ชาวตะการ เรียบร้อยแล้ว',
            'tracking_number' => '00142'
        ]);
        ScholarshipPaymentTransactionDetail::where('scholarship_payment_transaction_id',143)->first()->update([
            'description' => 'เบิกจ่ายค่าสนันสนุนโครงงาน/วิจัย สำหรับ นายมงคล ชาวตะการ เรียบร้อยแล้ว',
            'tracking_number' => '00143'
        ]);
        ScholarshipPaymentTransactionDetail::where('scholarship_payment_transaction_id',94)->first()->update([
            'description' => 'เบิกจ่ายค่าอุปกรณ์การเรียน สำหรับ น.ส. เกษรินทร์ รัตนนท์ เรียบร้อยแล้ว',
            'tracking_number' => '00094'
        ]);
        ScholarshipPaymentTransactionDetail::where('scholarship_payment_transaction_id',47)->first()->update([
            'description' => 'เบิกจ่ายค่าสนันสนุนโครงงาน/วิจัย สำหรับ น.ส. กันต์ฤทัย อัญชลี เรียบร้อยแล้ว',
            'tracking_number' => '00047'
        ]);
        ScholarshipPaymentTransactionDetail::where('scholarship_payment_transaction_id',46)->first()->update([
            'description' => 'เบิกจ่ายค่าอุปกรณ์การเรียน สำหรับ น.ส. กันต์ฤทัย อัญชลี เรียบร้อยแล้ว',
            'tracking_number' => '00046'
        ]);

        ScholarshipPaymentTransactionDetail::where('scholarship_payment_transaction_id',96)->first()->update([
            'description' => 'ทำเรื่องเบิกจ่ายค่าสนับสนุนวิจัยระยะสั้นในต่างประเทศ สำหรับ น.ส. เกษรินทร์ รัตนนท์',
            'tracking_number' => '00096'
        ]);
        ScholarshipPaymentTransactionDetail::where('scholarship_payment_transaction_id',95)->first()->update([
            'description' => 'เบิกจ่ายค่าสนันสนุนโครงงาน/วิจัย สำหรับ น.ส. เกษรินทร์ รัตนนท์',
            'tracking_number' => '00095'
        ]);
        ScholarshipPaymentTransactionDetail::where('scholarship_payment_transaction_id',144)->first()->update([
            'description' => 'ค่าสนับสนุนวิจัยระยะสั้นในต่างประเทศ สำหรับ นาย มงคล ชาวตะการ',
            'tracking_number' => '00144'
        ]);

        ScholarshipPaymentTransactionDetail::where('scholarship_payment_transaction_id',48)->first()->update([
            'description' => 'ค่าสนับสนุนวิจัยระยะสั้นในต่างประเทศ สำหรับ น.ส. กันต์ฤทัย อัญชลี',
            'tracking_number' => '00048'
        ]);

        ScholarshipPaymentTransactionAttachment::create([
            'scholarship_payment_transaction_id' => 142,
            'scholarship_attachment_id' => 1,
        ]);
        ScholarshipPaymentTransactionAttachment::create([
            'scholarship_payment_transaction_id' => 142,
            'scholarship_attachment_id' => 2,
        ]);
        ScholarshipPaymentTransactionAttachment::create([
            'scholarship_payment_transaction_id' => 142,
            'scholarship_attachment_id' => 3,
        ]);

        ScholarshipPaymentTransactionAttachment::create([
            'scholarship_payment_transaction_id' => 143,
            'scholarship_attachment_id' => 1,
        ]);
        ScholarshipPaymentTransactionAttachment::create([
            'scholarship_payment_transaction_id' => 143,
            'scholarship_attachment_id' => 2,
        ]);
        ScholarshipPaymentTransactionAttachment::create([
            'scholarship_payment_transaction_id' => 143,
            'scholarship_attachment_id' => 3,
        ]);

         ScholarshipPaymentTransactionAttachment::create([
            'scholarship_payment_transaction_id' => 94,
            'scholarship_attachment_id' => 1,
        ]);
        ScholarshipPaymentTransactionAttachment::create([
            'scholarship_payment_transaction_id' => 94,
            'scholarship_attachment_id' => 2,
        ]);
        ScholarshipPaymentTransactionAttachment::create([
            'scholarship_payment_transaction_id' => 94,
            'scholarship_attachment_id' => 3,
        ]);

         ScholarshipPaymentTransactionAttachment::create([
            'scholarship_payment_transaction_id' => 47,
            'scholarship_attachment_id' => 1,
        ]);
        ScholarshipPaymentTransactionAttachment::create([
            'scholarship_payment_transaction_id' => 47,
            'scholarship_attachment_id' => 2,
        ]);
        ScholarshipPaymentTransactionAttachment::create([
            'scholarship_payment_transaction_id' => 47,
            'scholarship_attachment_id' => 3,
        ]);

         ScholarshipPaymentTransactionAttachment::create([
            'scholarship_payment_transaction_id' => 46,
            'scholarship_attachment_id' => 1,
        ]);
        ScholarshipPaymentTransactionAttachment::create([
            'scholarship_payment_transaction_id' => 46,
            'scholarship_attachment_id' => 2,
        ]);
        ScholarshipPaymentTransactionAttachment::create([
            'scholarship_payment_transaction_id' => 46,
            'scholarship_attachment_id' => 3,
        ]);

        ScholarshipPaymentTransactionAttachment::create([
            'scholarship_payment_transaction_id' => 96,
            'scholarship_attachment_id' => 1,
        ]);
        ScholarshipPaymentTransactionAttachment::create([
            'scholarship_payment_transaction_id' => 96,
            'scholarship_attachment_id' => 2,
        ]);
        ScholarshipPaymentTransactionAttachment::create([
            'scholarship_payment_transaction_id' => 96,
            'scholarship_attachment_id' => 3,
        ]);

        ScholarshipPaymentTransactionAttachment::create([
            'scholarship_payment_transaction_id' => 95,
            'scholarship_attachment_id' => 1,
        ]);
        ScholarshipPaymentTransactionAttachment::create([
            'scholarship_payment_transaction_id' => 95,
            'scholarship_attachment_id' => 2,
        ]);
        ScholarshipPaymentTransactionAttachment::create([
            'scholarship_payment_transaction_id' => 95,
            'scholarship_attachment_id' => 3,
        ]);

        ScholarshipPaymentTransactionAttachment::create([
            'scholarship_payment_transaction_id' => 144,
            'scholarship_attachment_id' => 1,
        ]);
        ScholarshipPaymentTransactionAttachment::create([
            'scholarship_payment_transaction_id' => 144,
            'scholarship_attachment_id' => 2,
        ]);
        ScholarshipPaymentTransactionAttachment::create([
            'scholarship_payment_transaction_id' => 144,
            'scholarship_attachment_id' => 3,
        ]);

        ScholarshipPaymentTransactionAttachment::create([
            'scholarship_payment_transaction_id' => 48,
            'scholarship_attachment_id' => 1,
        ]);
        ScholarshipPaymentTransactionAttachment::create([
            'scholarship_payment_transaction_id' => 48,
            'scholarship_attachment_id' => 2,
        ]);
        ScholarshipPaymentTransactionAttachment::create([
            'scholarship_payment_transaction_id' => 48,
            'scholarship_attachment_id' => 3,
        ]);

        ScholarshipPaymentTransactionRevise::create([
            'scholarship_payment_transaction_id' => 142,
            'user_id' => 1,
            'message' => 'ให้ใช้ใบเสร็จรับเงินจากร้านค้า รบกวนส่งมาอีกครั้งค่ะ'
        ]);
        ScholarshipPaymentTransactionRevise::create([
            'scholarship_payment_transaction_id' => 142,
            'user_id' => 1,
            'message' => 'ใบเสร็จรับเงินต้องเป็นเอกสารตัวจริง รบกวนส่งมาอีกครั้งค่ะ'
        ]);
        ScholarshipPaymentTransactionRevise::create([
            'scholarship_payment_transaction_id' => 48,
            'user_id' => 1,
            'message' => 'ใบเสร็จรับเงินต้องเป็นเอกสารตัวจริง รบกวนส่งมาอีกครั้งค่ะ'
        ]);
    }
}
