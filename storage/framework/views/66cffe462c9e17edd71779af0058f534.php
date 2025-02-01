<div class="container-center">
            <div class="mt-16">
                
                <SectionTitle
                    size="sm"
                    subtitle={
                        <>
                            Vous cherchez à vous former ? Découvrez nos
                            nouveautés et télécharger des livres{" "}
                            <Link
                                class="underline"
                                href={route("book.index")}
                                target="_blank"
                            >
                                livre{" "}
                            </Link>{" "}
                            sur le business intelligence pour les entrepreneurs.
                        </>
                    }
                >
                    Dernières formations
                </SectionTitle>

                {trainings.length > 0 ? (
                    <div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                            {trainings.map((training) => (
                                <WelcomeTrainingItem
                                    key={training.id}
                                    training={training}
                                />
                            ))}
                        </div>
                    </div>
                ) : (
                    <Alert>
                        <AlertDescription class="text-center">
                            🌟 Les formations ne sont pas disponibles 🙏
                        </AlertDescription>
                    </Alert>
                )}
            </div>
        </div><?php /**PATH F:\laravel-app\syllaba-app\resources\views/welcome/post.blade.php ENDPATH**/ ?>