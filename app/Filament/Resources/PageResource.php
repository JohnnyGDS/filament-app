<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Models\Page;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Guava\FilamentIconPicker\Forms\IconPicker;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            Forms\Components\TextInput::make('title')
                ->required()
                ->live(onBlur: true)
                ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),

            Forms\Components\TextInput::make('slug')
                ->required()
                ->unique(Page::class, 'slug', ignoreRecord: true),
                
            IconPicker::make('icon')
                ->sets(['fontawesome-solid'])
                ->columns(3),

            Forms\Components\Builder::make('content')
                ->columnSpanFull()
                ->blocks([
                    // Hero Section Block
                    Forms\Components\Builder\Block::make('hero')
                        ->schema([
                            Forms\Components\Select::make('width')
                                ->options(require base_path('resources/views/site/blockwidth/blockwidth-array.php'))
                                ->default('full')
                                ->required(),
                            Forms\Components\TextInput::make('title')
                                ->required(),
                            Forms\Components\Textarea::make('subtitle'),
                            Forms\Components\FileUpload::make('image')
                                ->image()
                                ->imageEditor(),
                            Forms\Components\TextInput::make('button_text'),
                            Forms\Components\TextInput::make('button_url'),
                        ])
                        ->icon('heroicon-o-star'),

                    // Text Block
                    Forms\Components\Builder\Block::make('text')
                        ->schema([
                            Forms\Components\Select::make('width')
                                ->options(require base_path('resources/views/site/blockwidth/blockwidth-array.php'))
                                ->default('full')
                                ->required(),
                            Forms\Components\RichEditor::make('content')
                                ->required(),
                        ])
                        ->icon('heroicon-o-document-text'),

                    // Image Block
                    Forms\Components\Builder\Block::make('image')
                        ->schema([
                            Forms\Components\Select::make('width')
                                ->options(require base_path('resources/views/site/blockwidth/blockwidth-array.php'))
                                ->default('full')
                                ->required(),
                            Forms\Components\FileUpload::make('image')
                                ->image()
                                ->imageEditor()
                                ->required(),
                            Forms\Components\TextInput::make('alt')
                                ->label('Alt Text'),
                            Forms\Components\TextInput::make('caption'),
                        ])
                        ->icon('heroicon-o-photo'),

                    // Call to Action Block
                    Forms\Components\Builder\Block::make('cta')
                        ->schema([
                            Forms\Components\Select::make('width')
                                ->options(require base_path('resources/views/site/blockwidth/blockwidth-array.php'))
                                ->default('full')
                                ->required(),
                            Forms\Components\TextInput::make('heading')
                                ->required(),
                            Forms\Components\Textarea::make('description'),
                            Forms\Components\TextInput::make('button_text')
                                ->required(),
                            Forms\Components\TextInput::make('button_url')
                                ->required(),
                            Forms\Components\ColorPicker::make('background_color')
                                ->default('#f3f4f6'),
                        ])
                        ->icon('heroicon-o-megaphone'),

                    // Spacer Block
                    Forms\Components\Builder\Block::make('spacer')
                        ->schema([
                            Forms\Components\Select::make('width')
                                ->options(require base_path('resources/views/site/blockwidth/blockwidth-array.php'))
                                ->default('full')
                                ->required(),
                            Forms\Components\Select::make('size')
                                ->options([
                                    'small' => 'Small (20px)',
                                    'medium' => 'Medium (40px)',
                                    'large' => 'Large (80px)',
                                ])
                                ->default('medium'),
                        ])
                        ->icon('heroicon-o-minus'),
                ])
                ->collapsible()
                ->cloneable()
                ->reorderable()
                ->blockNumbers(false)
                ->addActionLabel('Add Content Block'),

            Forms\Components\Toggle::make('is_published')
                ->label('Published'),

            Forms\Components\Toggle::make('hide_from_nav')
                ->label('Hide from Navigation'),

            
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('sort_order')
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_published')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->defaultSort('sort_order')
            ->reorderable('sort_order') // This enables drag-and-drop reordering
            ->filters([
                Tables\Filters\TernaryFilter::make('is_published'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}