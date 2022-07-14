<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WorkforceResource\Pages;
use App\Filament\Resources\WorkforceResource\RelationManagers;
use App\Models\Workforce;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WorkforceResource extends Resource
{
    protected static ?string $model = Workforce::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Wizard::make([
                    Forms\Components\Wizard\Step::make('Identitas Diri')->schema([
                        Forms\Components\Select::make('user_id')
                            ->relationship('user', 'name')->label('Nama Pekerja')->default(auth()->user()->id)->disabled(),
                        Forms\Components\FileUpload::make('image_pasfoto')->label('Foto')->image(),
                        Forms\Components\TextInput::make('ktp')->required()->rule('numeric')->label('No KTP'),
                        Forms\Components\FileUpload::make('image_ktp')->label('Foto KTP')->image(),
                        Forms\Components\Select::make('jenis_kelamin')->required()->label('Jenis Kelamin')->options([
                                'pria' => 'Pria',
                                'wanita' => 'Wanita',
                            ]),
                        Forms\Components\Select::make('status_kawin')->required()->label('Status Perkawinan')->options([
                                'kawin' => 'Kawin',
                                'belum_kawin' => 'Belum Kawin',
                            ]),
                        Forms\Components\Select::make('agama')
                            ->options([
                                'islam' => 'Islam',
                                'katholik' => 'Katholik',
                                'protestan' => 'Protestan',
                                'budha' => 'Budha',
                                'hindu' => 'Hindu',
                                'lain-lain' => 'Lain-lain',
                            ]),
                        Forms\Components\TextInput::make('tempat_lahir')->required()->label('Tempat Lahir'),
                        Forms\Components\DatePicker::make('tanggal_lahir')->required()->label('Tanggal Lahir')->minDate(now()->subYears(150))->maxDate(now())->format('d/m/Y'),
                    ]),
                    Forms\Components\Wizard\Step::make('Kontak')->schema([
                        Forms\Components\TextInput::make('mobile')->required()->rule('numeric')->label('No Handphone'),
                        Forms\Components\MarkdownEditor::make('alamat')->required()->label('Alamat Sesuai KTP'),
                    ]),
                    Forms\Components\Wizard\Step::make('Pendidikan Terakhir')->schema([
                        Forms\Components\TextInput::make('nama_sekolah')->required()->label('Nama Sekolah'),
                        Forms\Components\Select::make('tingkat_pendidikan')->options([
                                'ttsd' => 'Tidak Tamat SD',
                                'sd' => 'SD',
                                'smp' => 'SMP',
                                'sma' => 'SMA',
                                'sarmud' => 'Sarjana Muda',
                                's1' => 'S1',
                                's2' => 'S2',
                                's3' => 'S3',
                                'akta' => 'Akta',
                            ])->required()->label('Tingkat Pendidikan'),
                        Forms\Components\TextInput::make('jurusan')->required()->label('Jurusan'),
                        Forms\Components\TextInput::make('tahun_lulus')->required()->label('Tahun Lulus'),
                        Forms\Components\TextInput::make('nilai_akhir')->required()->label('Nilai Akhir'),
                        Forms\Components\FileUpload::make('image_ijasah')->label('Foto Ijasah')->image(),
                    ]),
                    Forms\Components\Wizard\Step::make('Sertifikasi #1')->schema([
                        Forms\Components\TextInput::make('nama_pelatihan1')->label('Nama Pelatihan'),
                        Forms\Components\TextInput::make('jumlah_jam1')->label('Jumlah Jam'),
                        Forms\Components\DatePicker::make('tanggal_mulai_pelatihan1')->required()->label('Tanggal Mulai')->minDate(now()->subYears(5))->maxDate(now())->format('d/m/Y'),
                        Forms\Components\DatePicker::make('tanggal_selesai_pelatihan1')->required()->label('Tanggal Selesai')->minDate(now()->subYears(5))->maxDate(now())->format('d/m/Y'),
                        Forms\Components\FileUpload::make('image_pelatihan1')->label('Foto Sertifikat #1')->image(),
                    ]),
                    Forms\Components\Wizard\Step::make('Sertifikasi #2')->schema([
                        Forms\Components\TextInput::make('nama_pelatihan2')->label('Nama Pelatihan'),
                        Forms\Components\TextInput::make('jumlah_jam2')->label('Jumlah Jam'),
                        Forms\Components\DatePicker::make('tanggal_mulai_pelatihan2')->required()->label('Tanggal Mulai')->minDate(now()->subYears(5))->maxDate(now())->format('d/m/Y'),
                        Forms\Components\DatePicker::make('tanggal_selesai_pelatihan2')->required()->label('Tanggal Selesai')->minDate(now()->subYears(5))->maxDate(now())->format('d/m/Y'),
                        Forms\Components\FileUpload::make('image_pelatihan2')->label('Foto Sertifikat #2')->image(),
                    ]),
                    Forms\Components\Wizard\Step::make('Keahlian')->schema([
                        Forms\Components\TagsInput::make('keahlian')->separator(','),
                    ]),

                ])->columns([
                    'sm' => 2
                ])->columnSpan([
                    'sm' => 2
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListWorkforces::route('/'),
            'create' => Pages\CreateWorkforce::route('/create'),
            'edit' => Pages\EditWorkforce::route('/{record}/edit'),
        ];
    }    
}
