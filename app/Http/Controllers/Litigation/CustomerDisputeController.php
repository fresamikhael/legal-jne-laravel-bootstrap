<?php

namespace App\Http\Controllers\Litigation;

use App\Http\Controllers\Controller;
use App\Models\Cs;
use App\Models\CustomerDispute;
use Illuminate\Http\Request;

class CustomerDisputeController extends Controller
{
    public function index()
    {
        $data = CustomerDispute::where('user_id', auth()->user()->id)
            ->with('user')
            ->get();

        return view('pages.user.litigation.customer-dispute', compact('data'));
    }

    function store(Request $request)
    {
        $data = $request->all();
        
        $data['user_id'] = auth()->user()->id;

        if ($request->file('file_connote')) {
            $file = $request->file('file_connote');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_connote'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }
        if ($request->file('file_orion')) {
            $file = $request->file('file_orion');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_orion'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }
        if ($request->file('file_pod')) {
            $file = $request->file('file_pod');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_pod'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }
        if ($request->file('file_customer_case_form')) {
            $file = $request->file('file_customer_case_form');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_customer_case_form'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }
        if ($request->file('file_destination_chronology')) {
            $file = $request->file('file_destination_chronology');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_destination_chronology'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }
        if ($request->file('file_orion_chronology')) {
            $file = $request->file('file_orion_chronology');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_orion_chronology'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }
        if ($request->file('file_cs_chronology')) {
            $file = $request->file('file_cs_chronology');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_cs_chronology'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }
        if ($request->file('file_subpoena')) {
            $file = $request->file('file_subpoena');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_subpoena'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }
        if ($request->file('file_procuration')) {
            $file = $request->file('file_procuration');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_procuration'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }

        $cd = CustomerDispute::create($data);
        Cs::create([
            'form_id' => $cd->id,
            'user_id' => auth()->user()->id,
        ]);
        
        return to_route('litigation.customer-dispute.index')->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu, mohon untuk dapat memeriksa pengajuan secara berkala.');
    }
    
    public function show($id)
    {
        $cd = CustomerDispute::where('id', $id)->first();
        
        return view('pages.user.litigation.show-customer-dispute', compact('cd'));
    }

    public function indexLegal()
    {
        $data = CustomerDispute::where('user_id', auth()->user()->id)
            ->with('user')
            ->get();

        $submission = CustomerDispute::where('status', 'Update by CS')
            ->with('user')
            ->get();

        return view('pages.legal.litigation.customer-dispute', compact(['data', 'submission']));
    }

    function storeLegal(Request $request)
    {
        $data = $request->all();
        
        $data['user_id'] = auth()->user()->id;

        if ($request->file('file_connote')) {
            $file = $request->file('file_connote');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_connote'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }
        if ($request->file('file_orion')) {
            $file = $request->file('file_orion');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_orion'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }
        if ($request->file('file_pod')) {
            $file = $request->file('file_pod');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_pod'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }
        if ($request->file('file_customer_case_form')) {
            $file = $request->file('file_customer_case_form');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_customer_case_form'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }
        if ($request->file('file_destination_chronology')) {
            $file = $request->file('file_destination_chronology');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_destination_chronology'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }
        if ($request->file('file_orion_chronology')) {
            $file = $request->file('file_orion_chronology');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_orion_chronology'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }
        if ($request->file('file_cs_chronology')) {
            $file = $request->file('file_cs_chronology');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_cs_chronology'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }
        if ($request->file('file_subpoena')) {
            $file = $request->file('file_subpoena');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_subpoena'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }
        if ($request->file('file_procuration')) {
            $file = $request->file('file_procuration');
            $extension = $file->getClientOriginalExtension();
            $filename = str()->random(40) . '.' . $extension;
            $data['file_procuration'] = 'Litigation/'.$filename;
            $file->move('Litigation', $filename);
        }

        $cd = CustomerDispute::create($data);
        Cs::create([
            'form_id' => $cd->id,
            'user_id' => auth()->user()->id,
        ]);
        
        return to_route('legal.litigation.customer-dispute.index')->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu, mohon untuk dapat memeriksa pengajuan secara berkala.');
    }

    public function showLegal($id)
    {
        $data = CustomerDispute::where('id', $id)->first();
        
        return view('pages.legal.litigation.show-customer-dispute', compact('data'));
    }

    public function finishLegal(Request $request, $id)
    {
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;

        switch ($request->input('status')) {
            case 'Kasus selesai penggantian':
                $data['status'] = 'KASUS SELESAI PENGGANTIAN';
                
                if ($request->file('file_acceptance_letter')) {
                    $file = $request->file('file_acceptance_letter');
                    $extension = $file->getClientOriginalExtension();
                    $filename = str()->random(40) . '.' . $extension;
                    $data['file_acceptance_letter'] = 'Litigation/'.$filename;
                    $file->move('Litigation', $filename);
                }
                if ($request->file('file_case_report')) {
                    $file = $request->file('file_case_report');
                    $extension = $file->getClientOriginalExtension();
                    $filename = str()->random(40) . '.' . $extension;
                    $data['file_case_report'] = 'Litigation/'.$filename;
                    $file->move('Litigation', $filename);
                }

                Cs::where('form_id', $id)->update([
                    'file_acceptance_letter' => $data['file_acceptance_letter'],
                    'file_case_report' => $data['file_case_report'],
                    'status' => $data['status']
                ]);
                CustomerDispute::where('id', $id)->update([
                    'status' => $data['status']
                ]);

                return back()->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu, mohon untuk dapat memeriksa pengajuan secara berkala.');
                break;
            case 'Perdamaian':
                $data['status'] = 'PERDAMAIAN';

                if ($request->file('file_peace_agreement')) {
                    $file = $request->file('file_peace_agreement');
                    $extension = $file->getClientOriginalExtension();
                    $filename = str()->random(40) . '.' . $extension;
                    $data['file_peace_agreement'] = 'Litigation/'.$filename;
                    $file->move('Litigation', $filename);
                }
                if ($request->file('file_case_report')) {
                    $file = $request->file('file_case_report');
                    $extension = $file->getClientOriginalExtension();
                    $filename = str()->random(40) . '.' . $extension;
                    $data['file_case_report'] = 'Litigation/'.$filename;
                    $file->move('Litigation', $filename);
                }

                Cs::where('form_id', $id)->update([
                    'file_peace_agreement' => $data['file_peace_agreement'],
                    'file_case_report' => $data['file_case_report'],
                    'status' => $data['status'],
                ]);
                CustomerDispute::where('id', $id)->update([
                    'status' => $data['status']
                ]);

                return back()->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu, mohon untuk dapat memeriksa pengajuan secara berkala.');
                break;
            case 'Lewat > 3 Bulan':
                $data['status'] = 'LEWAT > 3 BULAN';

                if ($request->file('file_somasi_2')) {
                    $file = $request->file('file_somasi_2');
                    $extension = $file->getClientOriginalExtension();
                    $filename = str()->random(40) . '.' . $extension;
                    $data['file_somasi_2'] = 'Litigation/'.$filename;
                    $file->move('Litigation', $filename);
                }
                if ($request->file('file_customer_response_document')) {
                    $file = $request->file('file_customer_response_document');
                    $extension = $file->getClientOriginalExtension();
                    $filename = str()->random(40) . '.' . $extension;
                    $data['file_customer_response_document'] = 'Litigation/'.$filename;
                    $file->move('Litigation', $filename);
                }

                Cs::where('form_id', $id)->update([
                    'file_somasi_2' => $data['file_somasi_2'],
                    'file_customer_response_document' => $data['file_customer_response_document'],
                    'reason_case_temporary_close' => $data['reason_case_temporary_close'],
                    'status' => $data['status'],
                ]);
                CustomerDispute::where('id', $id)->update([
                    'status' => $data['status']
                ]);

                return back()->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu, mohon untuk dapat memeriksa pengajuan secara berkala.');
                break;
                case 'Lewat > 3 Bulan':
                $data['status'] = 'LEWAT > 3 BULAN';

                if ($request->file('file_somasi_2')) {
                    $file = $request->file('file_somasi_2');
                    $extension = $file->getClientOriginalExtension();
                    $filename = str()->random(40) . '.' . $extension;
                    $data['file_somasi_2'] = 'Litigation/'.$filename;
                    $file->move('Litigation', $filename);
                }
                if ($request->file('file_customer_response_document')) {
                    $file = $request->file('file_customer_response_document');
                    $extension = $file->getClientOriginalExtension();
                    $filename = str()->random(40) . '.' . $extension;
                    $data['file_customer_response_document'] = 'Litigation/'.$filename;
                    $file->move('Litigation', $filename);
                }

                Cs::where('form_id', $id)->update([
                    'file_somasi_2' => $data['file_somasi_2'],
                    'file_customer_response_document' => $data['file_customer_response_document'],
                    'reason_case_temporary_close' => $data['reason_case_temporary_close'],
                    'status' => $data['status'],
                ]);
                CustomerDispute::where('id', $id)->update([
                    'status' => $data['status']
                ]);

                return back()->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu, mohon untuk dapat memeriksa pengajuan secara berkala.');
                break;
            case 'Somasi':
                $data['status'] = 'SOMASI';

                if ($request->file('file_somasi_2')) {
                    $file = $request->file('file_somasi_2');
                    $extension = $file->getClientOriginalExtension();
                    $filename = str()->random(40) . '.' . $extension;
                    $data['file_somasi_2'] = 'Litigation/'.$filename;
                    $file->move('Litigation', $filename);
                }
                if ($request->file('file_customer_response_document')) {
                    $file = $request->file('file_customer_response_document');
                    $extension = $file->getClientOriginalExtension();
                    $filename = str()->random(40) . '.' . $extension;
                    $data['file_customer_response_document'] = 'Litigation/'.$filename;
                    $file->move('Litigation', $filename);
                }
                if ($request->file('file_case_progress_report')) {
                    $file = $request->file('file_case_progress_report');
                    $extension = $file->getClientOriginalExtension();
                    $filename = str()->random(40) . '.' . $extension;
                    $data['file_case_progress_report'] = 'Litigation/'.$filename;
                    $file->move('Litigation', $filename);
                }

                Cs::where('form_id', $id)->update([
                    'file_somasi_2' => $data['file_somasi_2'],
                    'file_customer_response_document' => $data['file_customer_response_document'],
                    'file_case_progress_report' => $data['file_case_progress_report'],
                    'status' => $data['status'],
                ]);
                CustomerDispute::where('id', $id)->update([
                    'status' => $data['status']
                ]);

                return back()->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu, mohon untuk dapat memeriksa pengajuan secara berkala.');
                break;
            case 'Gugatan Pengadilan':
                $data['status'] = 'GUGATAN PENGADILAN';

                if ($request->file('file_court_lawsuit')) {
                    $file = $request->file('file_court_lawsuit');
                    $extension = $file->getClientOriginalExtension();
                    $filename = str()->random(40) . '.' . $extension;
                    $data['file_court_lawsuit'] = 'Litigation/'.$filename;
                    $file->move('Litigation', $filename);
                }

                Cs::where('form_id', $id)->update([
                    'file_court_lawsuit' => $data['file_court_lawsuit'],
                    'status' => $data['status'],
                ]);
                CustomerDispute::where('id', $id)->update([
                    'status' => $data['status']
                ]);

                return back()->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu, mohon untuk dapat memeriksa pengajuan secara berkala.');
                break;
            case 'Gugatan BPSK':
                $data['status'] = 'GUGATAN BPSK';

                if ($request->file('file_court_bpsk')) {
                    $file = $request->file('file_court_bpsk');
                    $extension = $file->getClientOriginalExtension();
                    $filename = str()->random(40) . '.' . $extension;
                    $data['file_court_bpsk'] = 'Litigation/'.$filename;
                    $file->move('Litigation', $filename);
                }

                Cs::where('form_id', $id)->update([
                    'file_court_bpsk' => $data['file_court_bpsk'],
                    'status' => $data['status'],
                ]);
                CustomerDispute::where('id', $id)->update([
                    'status' => $data['status']
                ]);

                return back()->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu, mohon untuk dapat memeriksa pengajuan secara berkala.');
                break;
            default:
                return back();
                break;
        }
    }
}
