<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Category;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class UserController extends Controller
{
    public function admin(Request $request)
    {
        $contacts = Contact::paginate(7)->appends($request->query());
        $categories = Category::all();
        return view('admin', compact('contacts', 'categories'));
    }

    public function search(Request $request)
    {
        $contacts = Contact::with('category')
            ->CategorySearch($request->category_id)
            ->KeywordSearch($request->keyword)
            ->DateSearch($request->created_at)
            ->GenderSearch($request->gender)
            ->paginate(7)->appends($request->query());
        $categories = Category::all();
        return view('admin', compact('contacts', 'categories'));
    }

    public function destroy(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect('/admin')->with('message', 'データを削除しました');
    }

    public function export(Request $request)
    {
        $contacts = Contact::with('category')
            ->CategorySearch($request->category_id)
            ->KeywordSearch($request->keyword)
            ->DateSearch($request->created_at)
            ->GenderSearch($request->gender)
            ->get();

        $csvHeader = ['お名前', '性別', 'メールアドレス', 'お問い合わせの種類'];

        $response = new StreamedResponse(function () use ($contacts, $csvHeader) {
            $handle = fopen('php://output', 'w');
            
            fwrite($handle, "\xEF\xBB\xBF");
            
            fputcsv($handle, $csvHeader);

            foreach ($contacts as $contact) {
                $gender = 'その他';
                if ($contact->gender == 1) $gender = '男性';
                if ($contact->gender == 2) $gender = '女性';

                $csvRow = [
                    $contact->first_name . ' ' . $contact->last_name,
                    $gender,
                    $contact->email,
                    $contact->category->content ?? '未設定'
                ];
                fputcsv($handle, $csvRow);
            }
            fclose($handle);
        }, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="contacts_' . date('YmdHis') . '.csv"',
        ]);

        return $response;
    }
}
