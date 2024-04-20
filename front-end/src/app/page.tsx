import Image from "next/image";
import Link from "next/link";


export default function Home() {
  return (
    <main className="flex min-h-screen flex-col items-center justify-between p-24">
      <h1 className="text-4xl front-bold">homepage</h1>
      <hr />
      
      <nav className="mt-6">
        <Link className="text-blue-500" href="/portal/login"> Login </Link> ou {''}
        <Link className="text-blue-500" href="/portal/cadastro"> cadastre-se </Link>
      </nav>

    </main>
  );
}
