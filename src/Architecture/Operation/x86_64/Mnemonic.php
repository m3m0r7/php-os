<?php

declare(strict_types=1);

namespace PHPOS\Architecture\Operation\x86_64;

use PHPOS\Architecture\Operation\MnemonicInterface;
use PHPOS\Architecture\Operation\OperationCollection;
use PHPOS\Architecture\Operation\OperationType;
use PHPOS\Architecture\Operation\x86_64\Entity\Jmp;

/**
 * @see https://www.felixcloutier.com/x86/
 */
enum Mnemonic: string implements MnemonicInterface
{
    case AAA = \PHPOS\Architecture\Operation\x86_64\Entity\Aaa::class;
    case AAD = \PHPOS\Architecture\Operation\x86_64\Entity\Aad::class;
    case AAM = \PHPOS\Architecture\Operation\x86_64\Entity\Aam::class;
    case AAS = \PHPOS\Architecture\Operation\x86_64\Entity\Aas::class;
    case ADC = \PHPOS\Architecture\Operation\x86_64\Entity\Adc::class;
    case ADCX = \PHPOS\Architecture\Operation\x86_64\Entity\Adcx::class;
    case ADD = \PHPOS\Architecture\Operation\x86_64\Entity\Add::class;
    case ADDPD = \PHPOS\Architecture\Operation\x86_64\Entity\Addpd::class;
    case ADDPS = \PHPOS\Architecture\Operation\x86_64\Entity\Addps::class;
    case ADDSD = \PHPOS\Architecture\Operation\x86_64\Entity\Addsd::class;
    case ADDSS = \PHPOS\Architecture\Operation\x86_64\Entity\Addss::class;
    case ADDSUBPD = \PHPOS\Architecture\Operation\x86_64\Entity\Addsubpd::class;
    case ADDSUBPS = \PHPOS\Architecture\Operation\x86_64\Entity\Addsubps::class;
    case ADOX = \PHPOS\Architecture\Operation\x86_64\Entity\Adox::class;
    case AESDEC = \PHPOS\Architecture\Operation\x86_64\Entity\Aesdec::class;
    case AESDEC128KL = \PHPOS\Architecture\Operation\x86_64\Entity\Aesdec128kl::class;
    case AESDEC256KL = \PHPOS\Architecture\Operation\x86_64\Entity\Aesdec256kl::class;
    case AESDECLAST = \PHPOS\Architecture\Operation\x86_64\Entity\Aesdeclast::class;
    case AESDECWIDE128KL = \PHPOS\Architecture\Operation\x86_64\Entity\Aesdecwide128kl::class;
    case AESDECWIDE256KL = \PHPOS\Architecture\Operation\x86_64\Entity\Aesdecwide256kl::class;
    case AESENC = \PHPOS\Architecture\Operation\x86_64\Entity\Aesenc::class;
    case AESENC128KL = \PHPOS\Architecture\Operation\x86_64\Entity\Aesenc128kl::class;
    case AESENC256KL = \PHPOS\Architecture\Operation\x86_64\Entity\Aesenc256kl::class;
    case AESENCLAST = \PHPOS\Architecture\Operation\x86_64\Entity\Aesenclast::class;
    case AESENCWIDE128KL = \PHPOS\Architecture\Operation\x86_64\Entity\Aesencwide128kl::class;
    case AESENCWIDE256KL = \PHPOS\Architecture\Operation\x86_64\Entity\Aesencwide256kl::class;
    case AESIMC = \PHPOS\Architecture\Operation\x86_64\Entity\Aesimc::class;
    case AESKEYGENASSIST = \PHPOS\Architecture\Operation\x86_64\Entity\Aeskeygenassist::class;
    case AND_ = \PHPOS\Architecture\Operation\x86_64\Entity\And_::class;
    case ANDN = \PHPOS\Architecture\Operation\x86_64\Entity\Andn::class;
    case ANDNPD = \PHPOS\Architecture\Operation\x86_64\Entity\Andnpd::class;
    case ANDNPS = \PHPOS\Architecture\Operation\x86_64\Entity\Andnps::class;
    case ANDPD = \PHPOS\Architecture\Operation\x86_64\Entity\Andpd::class;
    case ANDPS = \PHPOS\Architecture\Operation\x86_64\Entity\Andps::class;
    case ARPL = \PHPOS\Architecture\Operation\x86_64\Entity\Arpl::class;
    case BEXTR = \PHPOS\Architecture\Operation\x86_64\Entity\Bextr::class;
    case BLENDPD = \PHPOS\Architecture\Operation\x86_64\Entity\Blendpd::class;
    case BLENDPS = \PHPOS\Architecture\Operation\x86_64\Entity\Blendps::class;
    case BLENDVPD = \PHPOS\Architecture\Operation\x86_64\Entity\Blendvpd::class;
    case BLENDVPS = \PHPOS\Architecture\Operation\x86_64\Entity\Blendvps::class;
    case BLSI = \PHPOS\Architecture\Operation\x86_64\Entity\Blsi::class;
    case BLSMSK = \PHPOS\Architecture\Operation\x86_64\Entity\Blsmsk::class;
    case BLSR = \PHPOS\Architecture\Operation\x86_64\Entity\Blsr::class;
    case BNDCL = \PHPOS\Architecture\Operation\x86_64\Entity\Bndcl::class;
    case BNDCN = \PHPOS\Architecture\Operation\x86_64\Entity\Bndcn::class;
    case BNDCU = \PHPOS\Architecture\Operation\x86_64\Entity\Bndcu::class;
    case BNDLDX = \PHPOS\Architecture\Operation\x86_64\Entity\Bndldx::class;
    case BNDMK = \PHPOS\Architecture\Operation\x86_64\Entity\Bndmk::class;
    case BNDMOV = \PHPOS\Architecture\Operation\x86_64\Entity\Bndmov::class;
    case BNDSTX = \PHPOS\Architecture\Operation\x86_64\Entity\Bndstx::class;
    case BOUND = \PHPOS\Architecture\Operation\x86_64\Entity\Bound::class;
    case BSF = \PHPOS\Architecture\Operation\x86_64\Entity\Bsf::class;
    case BSR = \PHPOS\Architecture\Operation\x86_64\Entity\Bsr::class;
    case BSWAP = \PHPOS\Architecture\Operation\x86_64\Entity\Bswap::class;
    case BT = \PHPOS\Architecture\Operation\x86_64\Entity\Bt::class;
    case BTC = \PHPOS\Architecture\Operation\x86_64\Entity\Btc::class;
    case BTR = \PHPOS\Architecture\Operation\x86_64\Entity\Btr::class;
    case BTS = \PHPOS\Architecture\Operation\x86_64\Entity\Bts::class;
    case BZHI = \PHPOS\Architecture\Operation\x86_64\Entity\Bzhi::class;
    case CALL = \PHPOS\Architecture\Operation\x86_64\Entity\Call::class;
    case CBW = \PHPOS\Architecture\Operation\x86_64\Entity\Cbw::class;
    case CDQ = \PHPOS\Architecture\Operation\x86_64\Entity\Cdq::class;
    case CDQE = \PHPOS\Architecture\Operation\x86_64\Entity\Cdqe::class;
    case CLAC = \PHPOS\Architecture\Operation\x86_64\Entity\Clac::class;
    case CLC = \PHPOS\Architecture\Operation\x86_64\Entity\Clc::class;
    case CLD = \PHPOS\Architecture\Operation\x86_64\Entity\Cld::class;
    case CLDEMOTE = \PHPOS\Architecture\Operation\x86_64\Entity\Cldemote::class;
    case CLFLUSH = \PHPOS\Architecture\Operation\x86_64\Entity\Clflush::class;
    case CLFLUSHOPT = \PHPOS\Architecture\Operation\x86_64\Entity\Clflushopt::class;
    case CLI = \PHPOS\Architecture\Operation\x86_64\Entity\Cli::class;
    case CLRSSBSY = \PHPOS\Architecture\Operation\x86_64\Entity\Clrssbsy::class;
    case CLTS = \PHPOS\Architecture\Operation\x86_64\Entity\Clts::class;
    case CLUI = \PHPOS\Architecture\Operation\x86_64\Entity\Clui::class;
    case CLWB = \PHPOS\Architecture\Operation\x86_64\Entity\Clwb::class;
    case CMC = \PHPOS\Architecture\Operation\x86_64\Entity\Cmc::class;
    case CMOVCC = \PHPOS\Architecture\Operation\x86_64\Entity\Cmovcc::class;
    case CMP = \PHPOS\Architecture\Operation\x86_64\Entity\Cmp::class;
    case CMPPD = \PHPOS\Architecture\Operation\x86_64\Entity\Cmppd::class;
    case CMPPS = \PHPOS\Architecture\Operation\x86_64\Entity\Cmpps::class;
    case CMPS = \PHPOS\Architecture\Operation\x86_64\Entity\Cmps::class;
    case CMPSB = \PHPOS\Architecture\Operation\x86_64\Entity\Cmpsb::class;
    case CMPSD = \PHPOS\Architecture\Operation\x86_64\Entity\Cmpsd::class;
    case CMPSQ = \PHPOS\Architecture\Operation\x86_64\Entity\Cmpsq::class;
    case CMPSS = \PHPOS\Architecture\Operation\x86_64\Entity\Cmpss::class;
    case CMPSW = \PHPOS\Architecture\Operation\x86_64\Entity\Cmpsw::class;
    case CMPXCHG = \PHPOS\Architecture\Operation\x86_64\Entity\Cmpxchg::class;
    case CMPXCHG16B = \PHPOS\Architecture\Operation\x86_64\Entity\Cmpxchg16b::class;
    case CMPXCHG8B = \PHPOS\Architecture\Operation\x86_64\Entity\Cmpxchg8b::class;
    case COMISD = \PHPOS\Architecture\Operation\x86_64\Entity\Comisd::class;
    case COMISS = \PHPOS\Architecture\Operation\x86_64\Entity\Comiss::class;
    case CPUID = \PHPOS\Architecture\Operation\x86_64\Entity\Cpuid::class;
    case CQO = \PHPOS\Architecture\Operation\x86_64\Entity\Cqo::class;
    case CRC32 = \PHPOS\Architecture\Operation\x86_64\Entity\Crc32::class;
    case CVTDQ2PD = \PHPOS\Architecture\Operation\x86_64\Entity\Cvtdq2pd::class;
    case CVTDQ2PS = \PHPOS\Architecture\Operation\x86_64\Entity\Cvtdq2ps::class;
    case CVTPD2DQ = \PHPOS\Architecture\Operation\x86_64\Entity\Cvtpd2dq::class;
    case CVTPD2PI = \PHPOS\Architecture\Operation\x86_64\Entity\Cvtpd2pi::class;
    case CVTPD2PS = \PHPOS\Architecture\Operation\x86_64\Entity\Cvtpd2ps::class;
    case CVTPI2PD = \PHPOS\Architecture\Operation\x86_64\Entity\Cvtpi2pd::class;
    case CVTPI2PS = \PHPOS\Architecture\Operation\x86_64\Entity\Cvtpi2ps::class;
    case CVTPS2DQ = \PHPOS\Architecture\Operation\x86_64\Entity\Cvtps2dq::class;
    case CVTPS2PD = \PHPOS\Architecture\Operation\x86_64\Entity\Cvtps2pd::class;
    case CVTPS2PI = \PHPOS\Architecture\Operation\x86_64\Entity\Cvtps2pi::class;
    case CVTSD2SI = \PHPOS\Architecture\Operation\x86_64\Entity\Cvtsd2si::class;
    case CVTSD2SS = \PHPOS\Architecture\Operation\x86_64\Entity\Cvtsd2ss::class;
    case CVTSI2SD = \PHPOS\Architecture\Operation\x86_64\Entity\Cvtsi2sd::class;
    case CVTSI2SS = \PHPOS\Architecture\Operation\x86_64\Entity\Cvtsi2ss::class;
    case CVTSS2SD = \PHPOS\Architecture\Operation\x86_64\Entity\Cvtss2sd::class;
    case CVTSS2SI = \PHPOS\Architecture\Operation\x86_64\Entity\Cvtss2si::class;
    case CVTTPD2DQ = \PHPOS\Architecture\Operation\x86_64\Entity\Cvttpd2dq::class;
    case CVTTPD2PI = \PHPOS\Architecture\Operation\x86_64\Entity\Cvttpd2pi::class;
    case CVTTPS2DQ = \PHPOS\Architecture\Operation\x86_64\Entity\Cvttps2dq::class;
    case CVTTPS2PI = \PHPOS\Architecture\Operation\x86_64\Entity\Cvttps2pi::class;
    case CVTTSD2SI = \PHPOS\Architecture\Operation\x86_64\Entity\Cvttsd2si::class;
    case CVTTSS2SI = \PHPOS\Architecture\Operation\x86_64\Entity\Cvttss2si::class;
    case CWD = \PHPOS\Architecture\Operation\x86_64\Entity\Cwd::class;
    case CWDE = \PHPOS\Architecture\Operation\x86_64\Entity\Cwde::class;
    case DAA = \PHPOS\Architecture\Operation\x86_64\Entity\Daa::class;
    case DAS = \PHPOS\Architecture\Operation\x86_64\Entity\Das::class;
    case DEC = \PHPOS\Architecture\Operation\x86_64\Entity\Dec::class;
    case DIV = \PHPOS\Architecture\Operation\x86_64\Entity\Div::class;
    case DIVPD = \PHPOS\Architecture\Operation\x86_64\Entity\Divpd::class;
    case DIVPS = \PHPOS\Architecture\Operation\x86_64\Entity\Divps::class;
    case DIVSD = \PHPOS\Architecture\Operation\x86_64\Entity\Divsd::class;
    case DIVSS = \PHPOS\Architecture\Operation\x86_64\Entity\Divss::class;
    case DPPD = \PHPOS\Architecture\Operation\x86_64\Entity\Dppd::class;
    case DPPS = \PHPOS\Architecture\Operation\x86_64\Entity\Dpps::class;
    case EMMS = \PHPOS\Architecture\Operation\x86_64\Entity\Emms::class;
    case ENCODEKEY128 = \PHPOS\Architecture\Operation\x86_64\Entity\Encodekey128::class;
    case ENCODEKEY256 = \PHPOS\Architecture\Operation\x86_64\Entity\Encodekey256::class;
    case ENDBR32 = \PHPOS\Architecture\Operation\x86_64\Entity\Endbr32::class;
    case ENDBR64 = \PHPOS\Architecture\Operation\x86_64\Entity\Endbr64::class;
    case ENQCMD = \PHPOS\Architecture\Operation\x86_64\Entity\Enqcmd::class;
    case ENQCMDS = \PHPOS\Architecture\Operation\x86_64\Entity\Enqcmds::class;
    case ENTER = \PHPOS\Architecture\Operation\x86_64\Entity\Enter::class;
    case EXTRACTPS = \PHPOS\Architecture\Operation\x86_64\Entity\Extractps::class;
    case F2XM1 = \PHPOS\Architecture\Operation\x86_64\Entity\F2xm1::class;
    case FABS = \PHPOS\Architecture\Operation\x86_64\Entity\Fabs::class;
    case FADD = \PHPOS\Architecture\Operation\x86_64\Entity\Fadd::class;
    case FADDP = \PHPOS\Architecture\Operation\x86_64\Entity\Faddp::class;
    case FBLD = \PHPOS\Architecture\Operation\x86_64\Entity\Fbld::class;
    case FBSTP = \PHPOS\Architecture\Operation\x86_64\Entity\Fbstp::class;
    case FCHS = \PHPOS\Architecture\Operation\x86_64\Entity\Fchs::class;
    case FCLEX = \PHPOS\Architecture\Operation\x86_64\Entity\Fclex::class;
    case FCMOVCC = \PHPOS\Architecture\Operation\x86_64\Entity\Fcmovcc::class;
    case FCOM = \PHPOS\Architecture\Operation\x86_64\Entity\Fcom::class;
    case FCOMI = \PHPOS\Architecture\Operation\x86_64\Entity\Fcomi::class;
    case FCOMIP = \PHPOS\Architecture\Operation\x86_64\Entity\Fcomip::class;
    case FCOMP = \PHPOS\Architecture\Operation\x86_64\Entity\Fcomp::class;
    case FCOMPP = \PHPOS\Architecture\Operation\x86_64\Entity\Fcompp::class;
    case FCOS = \PHPOS\Architecture\Operation\x86_64\Entity\Fcos::class;
    case FDECSTP = \PHPOS\Architecture\Operation\x86_64\Entity\Fdecstp::class;
    case FDIV = \PHPOS\Architecture\Operation\x86_64\Entity\Fdiv::class;
    case FDIVP = \PHPOS\Architecture\Operation\x86_64\Entity\Fdivp::class;
    case FDIVR = \PHPOS\Architecture\Operation\x86_64\Entity\Fdivr::class;
    case FDIVRP = \PHPOS\Architecture\Operation\x86_64\Entity\Fdivrp::class;
    case FFREE = \PHPOS\Architecture\Operation\x86_64\Entity\Ffree::class;
    case FIADD = \PHPOS\Architecture\Operation\x86_64\Entity\Fiadd::class;
    case FICOM = \PHPOS\Architecture\Operation\x86_64\Entity\Ficom::class;
    case FICOMP = \PHPOS\Architecture\Operation\x86_64\Entity\Ficomp::class;
    case FIDIV = \PHPOS\Architecture\Operation\x86_64\Entity\Fidiv::class;
    case FIDIVR = \PHPOS\Architecture\Operation\x86_64\Entity\Fidivr::class;
    case FILD = \PHPOS\Architecture\Operation\x86_64\Entity\Fild::class;
    case FIMUL = \PHPOS\Architecture\Operation\x86_64\Entity\Fimul::class;
    case FINCSTP = \PHPOS\Architecture\Operation\x86_64\Entity\Fincstp::class;
    case FINIT = \PHPOS\Architecture\Operation\x86_64\Entity\Finit::class;
    case FIST = \PHPOS\Architecture\Operation\x86_64\Entity\Fist::class;
    case FISTP = \PHPOS\Architecture\Operation\x86_64\Entity\Fistp::class;
    case FISTTP = \PHPOS\Architecture\Operation\x86_64\Entity\Fisttp::class;
    case FISUB = \PHPOS\Architecture\Operation\x86_64\Entity\Fisub::class;
    case FISUBR = \PHPOS\Architecture\Operation\x86_64\Entity\Fisubr::class;
    case FLD = \PHPOS\Architecture\Operation\x86_64\Entity\Fld::class;
    case FLD1 = \PHPOS\Architecture\Operation\x86_64\Entity\Fld1::class;
    case FLDCW = \PHPOS\Architecture\Operation\x86_64\Entity\Fldcw::class;
    case FLDENV = \PHPOS\Architecture\Operation\x86_64\Entity\Fldenv::class;
    case FLDL2E = \PHPOS\Architecture\Operation\x86_64\Entity\Fldl2e::class;
    case FLDL2T = \PHPOS\Architecture\Operation\x86_64\Entity\Fldl2t::class;
    case FLDLG2 = \PHPOS\Architecture\Operation\x86_64\Entity\Fldlg2::class;
    case FLDLN2 = \PHPOS\Architecture\Operation\x86_64\Entity\Fldln2::class;
    case FLDPI = \PHPOS\Architecture\Operation\x86_64\Entity\Fldpi::class;
    case FLDZ = \PHPOS\Architecture\Operation\x86_64\Entity\Fldz::class;
    case FMUL = \PHPOS\Architecture\Operation\x86_64\Entity\Fmul::class;
    case FMULP = \PHPOS\Architecture\Operation\x86_64\Entity\Fmulp::class;
    case FNCLEX = \PHPOS\Architecture\Operation\x86_64\Entity\Fnclex::class;
    case FNINIT = \PHPOS\Architecture\Operation\x86_64\Entity\Fninit::class;
    case FNOP = \PHPOS\Architecture\Operation\x86_64\Entity\Fnop::class;
    case FNSAVE = \PHPOS\Architecture\Operation\x86_64\Entity\Fnsave::class;
    case FNSTCW = \PHPOS\Architecture\Operation\x86_64\Entity\Fnstcw::class;
    case FNSTENV = \PHPOS\Architecture\Operation\x86_64\Entity\Fnstenv::class;
    case FNSTSW = \PHPOS\Architecture\Operation\x86_64\Entity\Fnstsw::class;
    case FPATAN = \PHPOS\Architecture\Operation\x86_64\Entity\Fpatan::class;
    case FPREM = \PHPOS\Architecture\Operation\x86_64\Entity\Fprem::class;
    case FPREM1 = \PHPOS\Architecture\Operation\x86_64\Entity\Fprem1::class;
    case FPTAN = \PHPOS\Architecture\Operation\x86_64\Entity\Fptan::class;
    case FRNDINT = \PHPOS\Architecture\Operation\x86_64\Entity\Frndint::class;
    case FRSTOR = \PHPOS\Architecture\Operation\x86_64\Entity\Frstor::class;
    case FSAVE = \PHPOS\Architecture\Operation\x86_64\Entity\Fsave::class;
    case FSCALE = \PHPOS\Architecture\Operation\x86_64\Entity\Fscale::class;
    case FSIN = \PHPOS\Architecture\Operation\x86_64\Entity\Fsin::class;
    case FSINCOS = \PHPOS\Architecture\Operation\x86_64\Entity\Fsincos::class;
    case FSQRT = \PHPOS\Architecture\Operation\x86_64\Entity\Fsqrt::class;
    case FST = \PHPOS\Architecture\Operation\x86_64\Entity\Fst::class;
    case FSTCW = \PHPOS\Architecture\Operation\x86_64\Entity\Fstcw::class;
    case FSTENV = \PHPOS\Architecture\Operation\x86_64\Entity\Fstenv::class;
    case FSTP = \PHPOS\Architecture\Operation\x86_64\Entity\Fstp::class;
    case FSTSW = \PHPOS\Architecture\Operation\x86_64\Entity\Fstsw::class;
    case FSUB = \PHPOS\Architecture\Operation\x86_64\Entity\Fsub::class;
    case FSUBP = \PHPOS\Architecture\Operation\x86_64\Entity\Fsubp::class;
    case FSUBR = \PHPOS\Architecture\Operation\x86_64\Entity\Fsubr::class;
    case FSUBRP = \PHPOS\Architecture\Operation\x86_64\Entity\Fsubrp::class;
    case FTST = \PHPOS\Architecture\Operation\x86_64\Entity\Ftst::class;
    case FUCOM = \PHPOS\Architecture\Operation\x86_64\Entity\Fucom::class;
    case FUCOMI = \PHPOS\Architecture\Operation\x86_64\Entity\Fucomi::class;
    case FUCOMIP = \PHPOS\Architecture\Operation\x86_64\Entity\Fucomip::class;
    case FUCOMP = \PHPOS\Architecture\Operation\x86_64\Entity\Fucomp::class;
    case FUCOMPP = \PHPOS\Architecture\Operation\x86_64\Entity\Fucompp::class;
    case FWAIT = \PHPOS\Architecture\Operation\x86_64\Entity\Fwait::class;
    case FXAM = \PHPOS\Architecture\Operation\x86_64\Entity\Fxam::class;
    case FXCH = \PHPOS\Architecture\Operation\x86_64\Entity\Fxch::class;
    case FXRSTOR = \PHPOS\Architecture\Operation\x86_64\Entity\Fxrstor::class;
    case FXSAVE = \PHPOS\Architecture\Operation\x86_64\Entity\Fxsave::class;
    case FXTRACT = \PHPOS\Architecture\Operation\x86_64\Entity\Fxtract::class;
    case FYL2X = \PHPOS\Architecture\Operation\x86_64\Entity\Fyl2x::class;
    case FYL2XP1 = \PHPOS\Architecture\Operation\x86_64\Entity\Fyl2xp1::class;
    case GF2P8AFFINEINVQB = \PHPOS\Architecture\Operation\x86_64\Entity\Gf2p8affineinvqb::class;
    case GF2P8AFFINEQB = \PHPOS\Architecture\Operation\x86_64\Entity\Gf2p8affineqb::class;
    case GF2P8MULB = \PHPOS\Architecture\Operation\x86_64\Entity\Gf2p8mulb::class;
    case HADDPD = \PHPOS\Architecture\Operation\x86_64\Entity\Haddpd::class;
    case HADDPS = \PHPOS\Architecture\Operation\x86_64\Entity\Haddps::class;
    case HLT = \PHPOS\Architecture\Operation\x86_64\Entity\Hlt::class;
    case HRESET = \PHPOS\Architecture\Operation\x86_64\Entity\Hreset::class;
    case HSUBPD = \PHPOS\Architecture\Operation\x86_64\Entity\Hsubpd::class;
    case HSUBPS = \PHPOS\Architecture\Operation\x86_64\Entity\Hsubps::class;
    case IDIV = \PHPOS\Architecture\Operation\x86_64\Entity\Idiv::class;
    case IMUL = \PHPOS\Architecture\Operation\x86_64\Entity\Imul::class;
    case IN = \PHPOS\Architecture\Operation\x86_64\Entity\In::class;
    case INC = \PHPOS\Architecture\Operation\x86_64\Entity\Inc::class;
    case INCSSPD = \PHPOS\Architecture\Operation\x86_64\Entity\Incsspd::class;
    case INCSSPQ = \PHPOS\Architecture\Operation\x86_64\Entity\Incsspq::class;
    case INS = \PHPOS\Architecture\Operation\x86_64\Entity\Ins::class;
    case INSB = \PHPOS\Architecture\Operation\x86_64\Entity\Insb::class;
    case INSD = \PHPOS\Architecture\Operation\x86_64\Entity\Insd::class;
    case INSERTPS = \PHPOS\Architecture\Operation\x86_64\Entity\Insertps::class;
    case INSW = \PHPOS\Architecture\Operation\x86_64\Entity\Insw::class;
    case INT_ = \PHPOS\Architecture\Operation\x86_64\Entity\Int_::class;
    case INT1 = \PHPOS\Architecture\Operation\x86_64\Entity\Int1::class;
    case INT3 = \PHPOS\Architecture\Operation\x86_64\Entity\Int3::class;
    case INTO = \PHPOS\Architecture\Operation\x86_64\Entity\Into::class;
    case INVD = \PHPOS\Architecture\Operation\x86_64\Entity\Invd::class;
    case INVLPG = \PHPOS\Architecture\Operation\x86_64\Entity\Invlpg::class;
    case INVPCID = \PHPOS\Architecture\Operation\x86_64\Entity\Invpcid::class;
    case IRET = \PHPOS\Architecture\Operation\x86_64\Entity\Iret::class;
    case IRETD = \PHPOS\Architecture\Operation\x86_64\Entity\Iretd::class;
    case IRETQ = \PHPOS\Architecture\Operation\x86_64\Entity\Iretq::class;
    case JMP = \PHPOS\Architecture\Operation\x86_64\Entity\Jmp::class;
    case JCC = \PHPOS\Architecture\Operation\x86_64\Entity\Jcc::class;
    case KADDB = \PHPOS\Architecture\Operation\x86_64\Entity\Kaddb::class;
    case KADDD = \PHPOS\Architecture\Operation\x86_64\Entity\Kaddd::class;
    case KADDQ = \PHPOS\Architecture\Operation\x86_64\Entity\Kaddq::class;
    case KADDW = \PHPOS\Architecture\Operation\x86_64\Entity\Kaddw::class;
    case KANDB = \PHPOS\Architecture\Operation\x86_64\Entity\Kandb::class;
    case KANDD = \PHPOS\Architecture\Operation\x86_64\Entity\Kandd::class;
    case KANDNB = \PHPOS\Architecture\Operation\x86_64\Entity\Kandnb::class;
    case KANDND = \PHPOS\Architecture\Operation\x86_64\Entity\Kandnd::class;
    case KANDNQ = \PHPOS\Architecture\Operation\x86_64\Entity\Kandnq::class;
    case KANDNW = \PHPOS\Architecture\Operation\x86_64\Entity\Kandnw::class;
    case KANDQ = \PHPOS\Architecture\Operation\x86_64\Entity\Kandq::class;
    case KANDW = \PHPOS\Architecture\Operation\x86_64\Entity\Kandw::class;
    case KMOVB = \PHPOS\Architecture\Operation\x86_64\Entity\Kmovb::class;
    case KMOVD = \PHPOS\Architecture\Operation\x86_64\Entity\Kmovd::class;
    case KMOVQ = \PHPOS\Architecture\Operation\x86_64\Entity\Kmovq::class;
    case KMOVW = \PHPOS\Architecture\Operation\x86_64\Entity\Kmovw::class;
    case KNOTB = \PHPOS\Architecture\Operation\x86_64\Entity\Knotb::class;
    case KNOTD = \PHPOS\Architecture\Operation\x86_64\Entity\Knotd::class;
    case KNOTQ = \PHPOS\Architecture\Operation\x86_64\Entity\Knotq::class;
    case KNOTW = \PHPOS\Architecture\Operation\x86_64\Entity\Knotw::class;
    case KORB = \PHPOS\Architecture\Operation\x86_64\Entity\Korb::class;
    case KORD = \PHPOS\Architecture\Operation\x86_64\Entity\Kord::class;
    case KORQ = \PHPOS\Architecture\Operation\x86_64\Entity\Korq::class;
    case KORTESTB = \PHPOS\Architecture\Operation\x86_64\Entity\Kortestb::class;
    case KORTESTD = \PHPOS\Architecture\Operation\x86_64\Entity\Kortestd::class;
    case KORTESTQ = \PHPOS\Architecture\Operation\x86_64\Entity\Kortestq::class;
    case KORTESTW = \PHPOS\Architecture\Operation\x86_64\Entity\Kortestw::class;
    case KORW = \PHPOS\Architecture\Operation\x86_64\Entity\Korw::class;
    case KSHIFTLB = \PHPOS\Architecture\Operation\x86_64\Entity\Kshiftlb::class;
    case KSHIFTLD = \PHPOS\Architecture\Operation\x86_64\Entity\Kshiftld::class;
    case KSHIFTLQ = \PHPOS\Architecture\Operation\x86_64\Entity\Kshiftlq::class;
    case KSHIFTLW = \PHPOS\Architecture\Operation\x86_64\Entity\Kshiftlw::class;
    case KSHIFTRB = \PHPOS\Architecture\Operation\x86_64\Entity\Kshiftrb::class;
    case KSHIFTRD = \PHPOS\Architecture\Operation\x86_64\Entity\Kshiftrd::class;
    case KSHIFTRQ = \PHPOS\Architecture\Operation\x86_64\Entity\Kshiftrq::class;
    case KSHIFTRW = \PHPOS\Architecture\Operation\x86_64\Entity\Kshiftrw::class;
    case KTESTB = \PHPOS\Architecture\Operation\x86_64\Entity\Ktestb::class;
    case KTESTD = \PHPOS\Architecture\Operation\x86_64\Entity\Ktestd::class;
    case KTESTQ = \PHPOS\Architecture\Operation\x86_64\Entity\Ktestq::class;
    case KTESTW = \PHPOS\Architecture\Operation\x86_64\Entity\Ktestw::class;
    case KUNPCKBW = \PHPOS\Architecture\Operation\x86_64\Entity\Kunpckbw::class;
    case KUNPCKDQ = \PHPOS\Architecture\Operation\x86_64\Entity\Kunpckdq::class;
    case KUNPCKWD = \PHPOS\Architecture\Operation\x86_64\Entity\Kunpckwd::class;
    case KXNORB = \PHPOS\Architecture\Operation\x86_64\Entity\Kxnorb::class;
    case KXNORD = \PHPOS\Architecture\Operation\x86_64\Entity\Kxnord::class;
    case KXNORQ = \PHPOS\Architecture\Operation\x86_64\Entity\Kxnorq::class;
    case KXNORW = \PHPOS\Architecture\Operation\x86_64\Entity\Kxnorw::class;
    case KXORB = \PHPOS\Architecture\Operation\x86_64\Entity\Kxorb::class;
    case KXORD = \PHPOS\Architecture\Operation\x86_64\Entity\Kxord::class;
    case KXORQ = \PHPOS\Architecture\Operation\x86_64\Entity\Kxorq::class;
    case KXORW = \PHPOS\Architecture\Operation\x86_64\Entity\Kxorw::class;
    case LAHF = \PHPOS\Architecture\Operation\x86_64\Entity\Lahf::class;
    case LAR = \PHPOS\Architecture\Operation\x86_64\Entity\Lar::class;
    case LDDQU = \PHPOS\Architecture\Operation\x86_64\Entity\Lddqu::class;
    case LDMXCSR = \PHPOS\Architecture\Operation\x86_64\Entity\Ldmxcsr::class;
    case LDS = \PHPOS\Architecture\Operation\x86_64\Entity\Lds::class;
    case LDTILECFG = \PHPOS\Architecture\Operation\x86_64\Entity\Ldtilecfg::class;
    case LEA = \PHPOS\Architecture\Operation\x86_64\Entity\Lea::class;
    case LEAVE = \PHPOS\Architecture\Operation\x86_64\Entity\Leave::class;
    case LES = \PHPOS\Architecture\Operation\x86_64\Entity\Les::class;
    case LFENCE = \PHPOS\Architecture\Operation\x86_64\Entity\Lfence::class;
    case LFS = \PHPOS\Architecture\Operation\x86_64\Entity\Lfs::class;
    case LGDT = \PHPOS\Architecture\Operation\x86_64\Entity\Lgdt::class;
    case LGS = \PHPOS\Architecture\Operation\x86_64\Entity\Lgs::class;
    case LIDT = \PHPOS\Architecture\Operation\x86_64\Entity\Lidt::class;
    case LLDT = \PHPOS\Architecture\Operation\x86_64\Entity\Lldt::class;
    case LMSW = \PHPOS\Architecture\Operation\x86_64\Entity\Lmsw::class;
    case LOADIWKEY = \PHPOS\Architecture\Operation\x86_64\Entity\Loadiwkey::class;
    case LOCK = \PHPOS\Architecture\Operation\x86_64\Entity\Lock::class;
    case LODS = \PHPOS\Architecture\Operation\x86_64\Entity\Lods::class;
    case LODSB = \PHPOS\Architecture\Operation\x86_64\Entity\Lodsb::class;
    case LODSD = \PHPOS\Architecture\Operation\x86_64\Entity\Lodsd::class;
    case LODSQ = \PHPOS\Architecture\Operation\x86_64\Entity\Lodsq::class;
    case LODSW = \PHPOS\Architecture\Operation\x86_64\Entity\Lodsw::class;
    case LOOP = \PHPOS\Architecture\Operation\x86_64\Entity\Loop::class;
    case LOOPCC = \PHPOS\Architecture\Operation\x86_64\Entity\Loopcc::class;
    case LSL = \PHPOS\Architecture\Operation\x86_64\Entity\Lsl::class;
    case LSS = \PHPOS\Architecture\Operation\x86_64\Entity\Lss::class;
    case LTR = \PHPOS\Architecture\Operation\x86_64\Entity\Ltr::class;
    case LZCNT = \PHPOS\Architecture\Operation\x86_64\Entity\Lzcnt::class;
    case MASKMOVDQU = \PHPOS\Architecture\Operation\x86_64\Entity\Maskmovdqu::class;
    case MASKMOVQ = \PHPOS\Architecture\Operation\x86_64\Entity\Maskmovq::class;
    case MAXPD = \PHPOS\Architecture\Operation\x86_64\Entity\Maxpd::class;
    case MAXPS = \PHPOS\Architecture\Operation\x86_64\Entity\Maxps::class;
    case MAXSD = \PHPOS\Architecture\Operation\x86_64\Entity\Maxsd::class;
    case MAXSS = \PHPOS\Architecture\Operation\x86_64\Entity\Maxss::class;
    case MFENCE = \PHPOS\Architecture\Operation\x86_64\Entity\Mfence::class;
    case MINPD = \PHPOS\Architecture\Operation\x86_64\Entity\Minpd::class;
    case MINPS = \PHPOS\Architecture\Operation\x86_64\Entity\Minps::class;
    case MINSD = \PHPOS\Architecture\Operation\x86_64\Entity\Minsd::class;
    case MINSS = \PHPOS\Architecture\Operation\x86_64\Entity\Minss::class;
    case MONITOR = \PHPOS\Architecture\Operation\x86_64\Entity\Monitor::class;
    case MOV = \PHPOS\Architecture\Operation\x86_64\Entity\Mov::class;
    case MOVAPD = \PHPOS\Architecture\Operation\x86_64\Entity\Movapd::class;
    case MOVAPS = \PHPOS\Architecture\Operation\x86_64\Entity\Movaps::class;
    case MOVBE = \PHPOS\Architecture\Operation\x86_64\Entity\Movbe::class;
    case MOVD = \PHPOS\Architecture\Operation\x86_64\Entity\Movd::class;
    case MOVDDUP = \PHPOS\Architecture\Operation\x86_64\Entity\Movddup::class;
    case MOVDIR64B = \PHPOS\Architecture\Operation\x86_64\Entity\Movdir64b::class;
    case MOVDIRI = \PHPOS\Architecture\Operation\x86_64\Entity\Movdiri::class;
    case MOVDQ2Q = \PHPOS\Architecture\Operation\x86_64\Entity\Movdq2q::class;
    case MOVDQA = \PHPOS\Architecture\Operation\x86_64\Entity\Movdqa::class;
    case MOVDQU = \PHPOS\Architecture\Operation\x86_64\Entity\Movdqu::class;
    case MOVHLPS = \PHPOS\Architecture\Operation\x86_64\Entity\Movhlps::class;
    case MOVHPD = \PHPOS\Architecture\Operation\x86_64\Entity\Movhpd::class;
    case MOVHPS = \PHPOS\Architecture\Operation\x86_64\Entity\Movhps::class;
    case MOVLHPS = \PHPOS\Architecture\Operation\x86_64\Entity\Movlhps::class;
    case MOVLPD = \PHPOS\Architecture\Operation\x86_64\Entity\Movlpd::class;
    case MOVLPS = \PHPOS\Architecture\Operation\x86_64\Entity\Movlps::class;
    case MOVMSKPD = \PHPOS\Architecture\Operation\x86_64\Entity\Movmskpd::class;
    case MOVMSKPS = \PHPOS\Architecture\Operation\x86_64\Entity\Movmskps::class;
    case MOVNTDQ = \PHPOS\Architecture\Operation\x86_64\Entity\Movntdq::class;
    case MOVNTDQA = \PHPOS\Architecture\Operation\x86_64\Entity\Movntdqa::class;
    case MOVNTI = \PHPOS\Architecture\Operation\x86_64\Entity\Movnti::class;
    case MOVNTPD = \PHPOS\Architecture\Operation\x86_64\Entity\Movntpd::class;
    case MOVNTPS = \PHPOS\Architecture\Operation\x86_64\Entity\Movntps::class;
    case MOVNTQ = \PHPOS\Architecture\Operation\x86_64\Entity\Movntq::class;
    case MOVQ = \PHPOS\Architecture\Operation\x86_64\Entity\Movq::class;
    case MOVQ2DQ = \PHPOS\Architecture\Operation\x86_64\Entity\Movq2dq::class;
    case MOVS = \PHPOS\Architecture\Operation\x86_64\Entity\Movs::class;
    case MOVSB = \PHPOS\Architecture\Operation\x86_64\Entity\Movsb::class;
    case MOVSD = \PHPOS\Architecture\Operation\x86_64\Entity\Movsd::class;
    case MOVSHDUP = \PHPOS\Architecture\Operation\x86_64\Entity\Movshdup::class;
    case MOVSLDUP = \PHPOS\Architecture\Operation\x86_64\Entity\Movsldup::class;
    case MOVSQ = \PHPOS\Architecture\Operation\x86_64\Entity\Movsq::class;
    case MOVSS = \PHPOS\Architecture\Operation\x86_64\Entity\Movss::class;
    case MOVSW = \PHPOS\Architecture\Operation\x86_64\Entity\Movsw::class;
    case MOVSX = \PHPOS\Architecture\Operation\x86_64\Entity\Movsx::class;
    case MOVSXD = \PHPOS\Architecture\Operation\x86_64\Entity\Movsxd::class;
    case MOVUPD = \PHPOS\Architecture\Operation\x86_64\Entity\Movupd::class;
    case MOVUPS = \PHPOS\Architecture\Operation\x86_64\Entity\Movups::class;
    case MOVZX = \PHPOS\Architecture\Operation\x86_64\Entity\Movzx::class;
    case MPSADBW = \PHPOS\Architecture\Operation\x86_64\Entity\Mpsadbw::class;
    case MUL = \PHPOS\Architecture\Operation\x86_64\Entity\Mul::class;
    case MULPD = \PHPOS\Architecture\Operation\x86_64\Entity\Mulpd::class;
    case MULPS = \PHPOS\Architecture\Operation\x86_64\Entity\Mulps::class;
    case MULSD = \PHPOS\Architecture\Operation\x86_64\Entity\Mulsd::class;
    case MULSS = \PHPOS\Architecture\Operation\x86_64\Entity\Mulss::class;
    case MULX = \PHPOS\Architecture\Operation\x86_64\Entity\Mulx::class;
    case MWAIT = \PHPOS\Architecture\Operation\x86_64\Entity\Mwait::class;
    case NEG = \PHPOS\Architecture\Operation\x86_64\Entity\Neg::class;
    case NOP = \PHPOS\Architecture\Operation\x86_64\Entity\Nop::class;
    case NOT = \PHPOS\Architecture\Operation\x86_64\Entity\Not::class;
    case OR_ = \PHPOS\Architecture\Operation\x86_64\Entity\Or_::class;
    case ORPD = \PHPOS\Architecture\Operation\x86_64\Entity\Orpd::class;
    case ORPS = \PHPOS\Architecture\Operation\x86_64\Entity\Orps::class;
    case OUT = \PHPOS\Architecture\Operation\x86_64\Entity\Out::class;
    case OUTS = \PHPOS\Architecture\Operation\x86_64\Entity\Outs::class;
    case OUTSB = \PHPOS\Architecture\Operation\x86_64\Entity\Outsb::class;
    case OUTSD = \PHPOS\Architecture\Operation\x86_64\Entity\Outsd::class;
    case OUTSW = \PHPOS\Architecture\Operation\x86_64\Entity\Outsw::class;
    case PABSB = \PHPOS\Architecture\Operation\x86_64\Entity\Pabsb::class;
    case PABSD = \PHPOS\Architecture\Operation\x86_64\Entity\Pabsd::class;
    case PABSQ = \PHPOS\Architecture\Operation\x86_64\Entity\Pabsq::class;
    case PABSW = \PHPOS\Architecture\Operation\x86_64\Entity\Pabsw::class;
    case PACKSSDW = \PHPOS\Architecture\Operation\x86_64\Entity\Packssdw::class;
    case PACKSSWB = \PHPOS\Architecture\Operation\x86_64\Entity\Packsswb::class;
    case PACKUSDW = \PHPOS\Architecture\Operation\x86_64\Entity\Packusdw::class;
    case PACKUSWB = \PHPOS\Architecture\Operation\x86_64\Entity\Packuswb::class;
    case PADDB = \PHPOS\Architecture\Operation\x86_64\Entity\Paddb::class;
    case PADDD = \PHPOS\Architecture\Operation\x86_64\Entity\Paddd::class;
    case PADDQ = \PHPOS\Architecture\Operation\x86_64\Entity\Paddq::class;
    case PADDSB = \PHPOS\Architecture\Operation\x86_64\Entity\Paddsb::class;
    case PADDSW = \PHPOS\Architecture\Operation\x86_64\Entity\Paddsw::class;
    case PADDUSB = \PHPOS\Architecture\Operation\x86_64\Entity\Paddusb::class;
    case PADDUSW = \PHPOS\Architecture\Operation\x86_64\Entity\Paddusw::class;
    case PADDW = \PHPOS\Architecture\Operation\x86_64\Entity\Paddw::class;
    case PALIGNR = \PHPOS\Architecture\Operation\x86_64\Entity\Palignr::class;
    case PAND = \PHPOS\Architecture\Operation\x86_64\Entity\Pand::class;
    case PANDN = \PHPOS\Architecture\Operation\x86_64\Entity\Pandn::class;
    case PAUSE = \PHPOS\Architecture\Operation\x86_64\Entity\Pause::class;
    case PAVGB = \PHPOS\Architecture\Operation\x86_64\Entity\Pavgb::class;
    case PAVGW = \PHPOS\Architecture\Operation\x86_64\Entity\Pavgw::class;
    case PBLENDVB = \PHPOS\Architecture\Operation\x86_64\Entity\Pblendvb::class;
    case PBLENDW = \PHPOS\Architecture\Operation\x86_64\Entity\Pblendw::class;
    case PCLMULQDQ = \PHPOS\Architecture\Operation\x86_64\Entity\Pclmulqdq::class;
    case PCMPEQB = \PHPOS\Architecture\Operation\x86_64\Entity\Pcmpeqb::class;
    case PCMPEQD = \PHPOS\Architecture\Operation\x86_64\Entity\Pcmpeqd::class;
    case PCMPEQQ = \PHPOS\Architecture\Operation\x86_64\Entity\Pcmpeqq::class;
    case PCMPEQW = \PHPOS\Architecture\Operation\x86_64\Entity\Pcmpeqw::class;
    case PCMPESTRI = \PHPOS\Architecture\Operation\x86_64\Entity\Pcmpestri::class;
    case PCMPESTRM = \PHPOS\Architecture\Operation\x86_64\Entity\Pcmpestrm::class;
    case PCMPGTB = \PHPOS\Architecture\Operation\x86_64\Entity\Pcmpgtb::class;
    case PCMPGTD = \PHPOS\Architecture\Operation\x86_64\Entity\Pcmpgtd::class;
    case PCMPGTQ = \PHPOS\Architecture\Operation\x86_64\Entity\Pcmpgtq::class;
    case PCMPGTW = \PHPOS\Architecture\Operation\x86_64\Entity\Pcmpgtw::class;
    case PCMPISTRI = \PHPOS\Architecture\Operation\x86_64\Entity\Pcmpistri::class;
    case PCMPISTRM = \PHPOS\Architecture\Operation\x86_64\Entity\Pcmpistrm::class;
    case PCONFIG = \PHPOS\Architecture\Operation\x86_64\Entity\Pconfig::class;
    case PDEP = \PHPOS\Architecture\Operation\x86_64\Entity\Pdep::class;
    case PEXT = \PHPOS\Architecture\Operation\x86_64\Entity\Pext::class;
    case PEXTRB = \PHPOS\Architecture\Operation\x86_64\Entity\Pextrb::class;
    case PEXTRD = \PHPOS\Architecture\Operation\x86_64\Entity\Pextrd::class;
    case PEXTRQ = \PHPOS\Architecture\Operation\x86_64\Entity\Pextrq::class;
    case PEXTRW = \PHPOS\Architecture\Operation\x86_64\Entity\Pextrw::class;
    case PHADDD = \PHPOS\Architecture\Operation\x86_64\Entity\Phaddd::class;
    case PHADDSW = \PHPOS\Architecture\Operation\x86_64\Entity\Phaddsw::class;
    case PHADDW = \PHPOS\Architecture\Operation\x86_64\Entity\Phaddw::class;
    case PHMINPOSUW = \PHPOS\Architecture\Operation\x86_64\Entity\Phminposuw::class;
    case PHSUBD = \PHPOS\Architecture\Operation\x86_64\Entity\Phsubd::class;
    case PHSUBSW = \PHPOS\Architecture\Operation\x86_64\Entity\Phsubsw::class;
    case PHSUBW = \PHPOS\Architecture\Operation\x86_64\Entity\Phsubw::class;
    case PINSRB = \PHPOS\Architecture\Operation\x86_64\Entity\Pinsrb::class;
    case PINSRD = \PHPOS\Architecture\Operation\x86_64\Entity\Pinsrd::class;
    case PINSRQ = \PHPOS\Architecture\Operation\x86_64\Entity\Pinsrq::class;
    case PINSRW = \PHPOS\Architecture\Operation\x86_64\Entity\Pinsrw::class;
    case PMADDUBSW = \PHPOS\Architecture\Operation\x86_64\Entity\Pmaddubsw::class;
    case PMADDWD = \PHPOS\Architecture\Operation\x86_64\Entity\Pmaddwd::class;
    case PMAXSB = \PHPOS\Architecture\Operation\x86_64\Entity\Pmaxsb::class;
    case PMAXSD = \PHPOS\Architecture\Operation\x86_64\Entity\Pmaxsd::class;
    case PMAXSQ = \PHPOS\Architecture\Operation\x86_64\Entity\Pmaxsq::class;
    case PMAXSW = \PHPOS\Architecture\Operation\x86_64\Entity\Pmaxsw::class;
    case PMAXUB = \PHPOS\Architecture\Operation\x86_64\Entity\Pmaxub::class;
    case PMAXUD = \PHPOS\Architecture\Operation\x86_64\Entity\Pmaxud::class;
    case PMAXUQ = \PHPOS\Architecture\Operation\x86_64\Entity\Pmaxuq::class;
    case PMAXUW = \PHPOS\Architecture\Operation\x86_64\Entity\Pmaxuw::class;
    case PMINSB = \PHPOS\Architecture\Operation\x86_64\Entity\Pminsb::class;
    case PMINSD = \PHPOS\Architecture\Operation\x86_64\Entity\Pminsd::class;
    case PMINSQ = \PHPOS\Architecture\Operation\x86_64\Entity\Pminsq::class;
    case PMINSW = \PHPOS\Architecture\Operation\x86_64\Entity\Pminsw::class;
    case PMINUB = \PHPOS\Architecture\Operation\x86_64\Entity\Pminub::class;
    case PMINUD = \PHPOS\Architecture\Operation\x86_64\Entity\Pminud::class;
    case PMINUQ = \PHPOS\Architecture\Operation\x86_64\Entity\Pminuq::class;
    case PMINUW = \PHPOS\Architecture\Operation\x86_64\Entity\Pminuw::class;
    case PMOVMSKB = \PHPOS\Architecture\Operation\x86_64\Entity\Pmovmskb::class;
    case PMOVSX = \PHPOS\Architecture\Operation\x86_64\Entity\Pmovsx::class;
    case PMOVZX = \PHPOS\Architecture\Operation\x86_64\Entity\Pmovzx::class;
    case PMULDQ = \PHPOS\Architecture\Operation\x86_64\Entity\Pmuldq::class;
    case PMULHRSW = \PHPOS\Architecture\Operation\x86_64\Entity\Pmulhrsw::class;
    case PMULHUW = \PHPOS\Architecture\Operation\x86_64\Entity\Pmulhuw::class;
    case PMULHW = \PHPOS\Architecture\Operation\x86_64\Entity\Pmulhw::class;
    case PMULLD = \PHPOS\Architecture\Operation\x86_64\Entity\Pmulld::class;
    case PMULLQ = \PHPOS\Architecture\Operation\x86_64\Entity\Pmullq::class;
    case PMULLW = \PHPOS\Architecture\Operation\x86_64\Entity\Pmullw::class;
    case PMULUDQ = \PHPOS\Architecture\Operation\x86_64\Entity\Pmuludq::class;
    case POP = \PHPOS\Architecture\Operation\x86_64\Entity\Pop::class;
    case POPA = \PHPOS\Architecture\Operation\x86_64\Entity\Popa::class;
    case POPAD = \PHPOS\Architecture\Operation\x86_64\Entity\Popad::class;
    case POPCNT = \PHPOS\Architecture\Operation\x86_64\Entity\Popcnt::class;
    case POPF = \PHPOS\Architecture\Operation\x86_64\Entity\Popf::class;
    case POPFD = \PHPOS\Architecture\Operation\x86_64\Entity\Popfd::class;
    case POPFQ = \PHPOS\Architecture\Operation\x86_64\Entity\Popfq::class;
    case POR = \PHPOS\Architecture\Operation\x86_64\Entity\Por::class;
    case PREFETCHW = \PHPOS\Architecture\Operation\x86_64\Entity\Prefetchw::class;
    case PREFETCHH = \PHPOS\Architecture\Operation\x86_64\Entity\Prefetchh::class;
    case PSADBW = \PHPOS\Architecture\Operation\x86_64\Entity\Psadbw::class;
    case PSHUFB = \PHPOS\Architecture\Operation\x86_64\Entity\Pshufb::class;
    case PSHUFD = \PHPOS\Architecture\Operation\x86_64\Entity\Pshufd::class;
    case PSHUFHW = \PHPOS\Architecture\Operation\x86_64\Entity\Pshufhw::class;
    case PSHUFLW = \PHPOS\Architecture\Operation\x86_64\Entity\Pshuflw::class;
    case PSHUFW = \PHPOS\Architecture\Operation\x86_64\Entity\Pshufw::class;
    case PSIGNB = \PHPOS\Architecture\Operation\x86_64\Entity\Psignb::class;
    case PSIGND = \PHPOS\Architecture\Operation\x86_64\Entity\Psignd::class;
    case PSIGNW = \PHPOS\Architecture\Operation\x86_64\Entity\Psignw::class;
    case PSLLD = \PHPOS\Architecture\Operation\x86_64\Entity\Pslld::class;
    case PSLLDQ = \PHPOS\Architecture\Operation\x86_64\Entity\Pslldq::class;
    case PSLLQ = \PHPOS\Architecture\Operation\x86_64\Entity\Psllq::class;
    case PSLLW = \PHPOS\Architecture\Operation\x86_64\Entity\Psllw::class;
    case PSRAD = \PHPOS\Architecture\Operation\x86_64\Entity\Psrad::class;
    case PSRAQ = \PHPOS\Architecture\Operation\x86_64\Entity\Psraq::class;
    case PSRAW = \PHPOS\Architecture\Operation\x86_64\Entity\Psraw::class;
    case PSRLD = \PHPOS\Architecture\Operation\x86_64\Entity\Psrld::class;
    case PSRLDQ = \PHPOS\Architecture\Operation\x86_64\Entity\Psrldq::class;
    case PSRLQ = \PHPOS\Architecture\Operation\x86_64\Entity\Psrlq::class;
    case PSRLW = \PHPOS\Architecture\Operation\x86_64\Entity\Psrlw::class;
    case PSUBB = \PHPOS\Architecture\Operation\x86_64\Entity\Psubb::class;
    case PSUBD = \PHPOS\Architecture\Operation\x86_64\Entity\Psubd::class;
    case PSUBQ = \PHPOS\Architecture\Operation\x86_64\Entity\Psubq::class;
    case PSUBSB = \PHPOS\Architecture\Operation\x86_64\Entity\Psubsb::class;
    case PSUBSW = \PHPOS\Architecture\Operation\x86_64\Entity\Psubsw::class;
    case PSUBUSB = \PHPOS\Architecture\Operation\x86_64\Entity\Psubusb::class;
    case PSUBUSW = \PHPOS\Architecture\Operation\x86_64\Entity\Psubusw::class;
    case PSUBW = \PHPOS\Architecture\Operation\x86_64\Entity\Psubw::class;
    case PTEST = \PHPOS\Architecture\Operation\x86_64\Entity\Ptest::class;
    case PTWRITE = \PHPOS\Architecture\Operation\x86_64\Entity\Ptwrite::class;
    case PUNPCKHBW = \PHPOS\Architecture\Operation\x86_64\Entity\Punpckhbw::class;
    case PUNPCKHDQ = \PHPOS\Architecture\Operation\x86_64\Entity\Punpckhdq::class;
    case PUNPCKHQDQ = \PHPOS\Architecture\Operation\x86_64\Entity\Punpckhqdq::class;
    case PUNPCKHWD = \PHPOS\Architecture\Operation\x86_64\Entity\Punpckhwd::class;
    case PUNPCKLBW = \PHPOS\Architecture\Operation\x86_64\Entity\Punpcklbw::class;
    case PUNPCKLDQ = \PHPOS\Architecture\Operation\x86_64\Entity\Punpckldq::class;
    case PUNPCKLQDQ = \PHPOS\Architecture\Operation\x86_64\Entity\Punpcklqdq::class;
    case PUNPCKLWD = \PHPOS\Architecture\Operation\x86_64\Entity\Punpcklwd::class;
    case PUSH = \PHPOS\Architecture\Operation\x86_64\Entity\Push::class;
    case PUSHA = \PHPOS\Architecture\Operation\x86_64\Entity\Pusha::class;
    case PUSHAD = \PHPOS\Architecture\Operation\x86_64\Entity\Pushad::class;
    case PUSHF = \PHPOS\Architecture\Operation\x86_64\Entity\Pushf::class;
    case PUSHFD = \PHPOS\Architecture\Operation\x86_64\Entity\Pushfd::class;
    case PUSHFQ = \PHPOS\Architecture\Operation\x86_64\Entity\Pushfq::class;
    case PXOR = \PHPOS\Architecture\Operation\x86_64\Entity\Pxor::class;
    case RCL = \PHPOS\Architecture\Operation\x86_64\Entity\Rcl::class;
    case RCPPS = \PHPOS\Architecture\Operation\x86_64\Entity\Rcpps::class;
    case RCPSS = \PHPOS\Architecture\Operation\x86_64\Entity\Rcpss::class;
    case RCR = \PHPOS\Architecture\Operation\x86_64\Entity\Rcr::class;
    case RDFSBASE = \PHPOS\Architecture\Operation\x86_64\Entity\Rdfsbase::class;
    case RDGSBASE = \PHPOS\Architecture\Operation\x86_64\Entity\Rdgsbase::class;
    case RDMSR = \PHPOS\Architecture\Operation\x86_64\Entity\Rdmsr::class;
    case RDPID = \PHPOS\Architecture\Operation\x86_64\Entity\Rdpid::class;
    case RDPKRU = \PHPOS\Architecture\Operation\x86_64\Entity\Rdpkru::class;
    case RDPMC = \PHPOS\Architecture\Operation\x86_64\Entity\Rdpmc::class;
    case RDRAND = \PHPOS\Architecture\Operation\x86_64\Entity\Rdrand::class;
    case RDSEED = \PHPOS\Architecture\Operation\x86_64\Entity\Rdseed::class;
    case RDSSPD = \PHPOS\Architecture\Operation\x86_64\Entity\Rdsspd::class;
    case RDSSPQ = \PHPOS\Architecture\Operation\x86_64\Entity\Rdsspq::class;
    case RDTSC = \PHPOS\Architecture\Operation\x86_64\Entity\Rdtsc::class;
    case RDTSCP = \PHPOS\Architecture\Operation\x86_64\Entity\Rdtscp::class;
    case REP = \PHPOS\Architecture\Operation\x86_64\Entity\Rep::class;
    case REPE = \PHPOS\Architecture\Operation\x86_64\Entity\Repe::class;
    case REPNE = \PHPOS\Architecture\Operation\x86_64\Entity\Repne::class;
    case REPNZ = \PHPOS\Architecture\Operation\x86_64\Entity\Repnz::class;
    case REPZ = \PHPOS\Architecture\Operation\x86_64\Entity\Repz::class;
    case RET = \PHPOS\Architecture\Operation\x86_64\Entity\Ret::class;
    case ROL = \PHPOS\Architecture\Operation\x86_64\Entity\Rol::class;
    case ROR = \PHPOS\Architecture\Operation\x86_64\Entity\Ror::class;
    case RORX = \PHPOS\Architecture\Operation\x86_64\Entity\Rorx::class;
    case ROUNDPD = \PHPOS\Architecture\Operation\x86_64\Entity\Roundpd::class;
    case ROUNDPS = \PHPOS\Architecture\Operation\x86_64\Entity\Roundps::class;
    case ROUNDSD = \PHPOS\Architecture\Operation\x86_64\Entity\Roundsd::class;
    case ROUNDSS = \PHPOS\Architecture\Operation\x86_64\Entity\Roundss::class;
    case RSM = \PHPOS\Architecture\Operation\x86_64\Entity\Rsm::class;
    case RSQRTPS = \PHPOS\Architecture\Operation\x86_64\Entity\Rsqrtps::class;
    case RSQRTSS = \PHPOS\Architecture\Operation\x86_64\Entity\Rsqrtss::class;
    case RSTORSSP = \PHPOS\Architecture\Operation\x86_64\Entity\Rstorssp::class;
    case SAHF = \PHPOS\Architecture\Operation\x86_64\Entity\Sahf::class;
    case SAL = \PHPOS\Architecture\Operation\x86_64\Entity\Sal::class;
    case SAR = \PHPOS\Architecture\Operation\x86_64\Entity\Sar::class;
    case SARX = \PHPOS\Architecture\Operation\x86_64\Entity\Sarx::class;
    case SAVEPREVSSP = \PHPOS\Architecture\Operation\x86_64\Entity\Saveprevssp::class;
    case SBB = \PHPOS\Architecture\Operation\x86_64\Entity\Sbb::class;
    case SCAS = \PHPOS\Architecture\Operation\x86_64\Entity\Scas::class;
    case SCASB = \PHPOS\Architecture\Operation\x86_64\Entity\Scasb::class;
    case SCASD = \PHPOS\Architecture\Operation\x86_64\Entity\Scasd::class;
    case SCASW = \PHPOS\Architecture\Operation\x86_64\Entity\Scasw::class;
    case SENDUIPI = \PHPOS\Architecture\Operation\x86_64\Entity\Senduipi::class;
    case SERIALIZE = \PHPOS\Architecture\Operation\x86_64\Entity\Serialize::class;
    case SETSSBSY = \PHPOS\Architecture\Operation\x86_64\Entity\Setssbsy::class;
    case SETCC = \PHPOS\Architecture\Operation\x86_64\Entity\Setcc::class;
    case SFENCE = \PHPOS\Architecture\Operation\x86_64\Entity\Sfence::class;
    case SGDT = \PHPOS\Architecture\Operation\x86_64\Entity\Sgdt::class;
    case SHA1MSG1 = \PHPOS\Architecture\Operation\x86_64\Entity\Sha1msg1::class;
    case SHA1MSG2 = \PHPOS\Architecture\Operation\x86_64\Entity\Sha1msg2::class;
    case SHA1NEXTE = \PHPOS\Architecture\Operation\x86_64\Entity\Sha1nexte::class;
    case SHA1RNDS4 = \PHPOS\Architecture\Operation\x86_64\Entity\Sha1rnds4::class;
    case SHA256MSG1 = \PHPOS\Architecture\Operation\x86_64\Entity\Sha256msg1::class;
    case SHA256MSG2 = \PHPOS\Architecture\Operation\x86_64\Entity\Sha256msg2::class;
    case SHA256RNDS2 = \PHPOS\Architecture\Operation\x86_64\Entity\Sha256rnds2::class;
    case SHL = \PHPOS\Architecture\Operation\x86_64\Entity\Shl::class;
    case SHLD = \PHPOS\Architecture\Operation\x86_64\Entity\Shld::class;
    case SHLX = \PHPOS\Architecture\Operation\x86_64\Entity\Shlx::class;
    case SHR = \PHPOS\Architecture\Operation\x86_64\Entity\Shr::class;
    case SHRD = \PHPOS\Architecture\Operation\x86_64\Entity\Shrd::class;
    case SHRX = \PHPOS\Architecture\Operation\x86_64\Entity\Shrx::class;
    case SHUFPD = \PHPOS\Architecture\Operation\x86_64\Entity\Shufpd::class;
    case SHUFPS = \PHPOS\Architecture\Operation\x86_64\Entity\Shufps::class;
    case SIDT = \PHPOS\Architecture\Operation\x86_64\Entity\Sidt::class;
    case SLDT = \PHPOS\Architecture\Operation\x86_64\Entity\Sldt::class;
    case SMSW = \PHPOS\Architecture\Operation\x86_64\Entity\Smsw::class;
    case SQRTPD = \PHPOS\Architecture\Operation\x86_64\Entity\Sqrtpd::class;
    case SQRTPS = \PHPOS\Architecture\Operation\x86_64\Entity\Sqrtps::class;
    case SQRTSD = \PHPOS\Architecture\Operation\x86_64\Entity\Sqrtsd::class;
    case SQRTSS = \PHPOS\Architecture\Operation\x86_64\Entity\Sqrtss::class;
    case STAC = \PHPOS\Architecture\Operation\x86_64\Entity\Stac::class;
    case STC = \PHPOS\Architecture\Operation\x86_64\Entity\Stc::class;
    case STD = \PHPOS\Architecture\Operation\x86_64\Entity\Std::class;
    case STI = \PHPOS\Architecture\Operation\x86_64\Entity\Sti::class;
    case STMXCSR = \PHPOS\Architecture\Operation\x86_64\Entity\Stmxcsr::class;
    case STOS = \PHPOS\Architecture\Operation\x86_64\Entity\Stos::class;
    case STOSB = \PHPOS\Architecture\Operation\x86_64\Entity\Stosb::class;
    case STOSD = \PHPOS\Architecture\Operation\x86_64\Entity\Stosd::class;
    case STOSQ = \PHPOS\Architecture\Operation\x86_64\Entity\Stosq::class;
    case STOSW = \PHPOS\Architecture\Operation\x86_64\Entity\Stosw::class;
    case STR = \PHPOS\Architecture\Operation\x86_64\Entity\Str::class;
    case STTILECFG = \PHPOS\Architecture\Operation\x86_64\Entity\Sttilecfg::class;
    case STUI = \PHPOS\Architecture\Operation\x86_64\Entity\Stui::class;
    case SUB = \PHPOS\Architecture\Operation\x86_64\Entity\Sub::class;
    case SUBPD = \PHPOS\Architecture\Operation\x86_64\Entity\Subpd::class;
    case SUBPS = \PHPOS\Architecture\Operation\x86_64\Entity\Subps::class;
    case SUBSD = \PHPOS\Architecture\Operation\x86_64\Entity\Subsd::class;
    case SUBSS = \PHPOS\Architecture\Operation\x86_64\Entity\Subss::class;
    case SWAPGS = \PHPOS\Architecture\Operation\x86_64\Entity\Swapgs::class;
    case SYSCALL = \PHPOS\Architecture\Operation\x86_64\Entity\Syscall::class;
    case SYSENTER = \PHPOS\Architecture\Operation\x86_64\Entity\Sysenter::class;
    case SYSEXIT = \PHPOS\Architecture\Operation\x86_64\Entity\Sysexit::class;
    case SYSRET = \PHPOS\Architecture\Operation\x86_64\Entity\Sysret::class;
    case TDPBF16PS = \PHPOS\Architecture\Operation\x86_64\Entity\Tdpbf16ps::class;
    case TDPBSSD = \PHPOS\Architecture\Operation\x86_64\Entity\Tdpbssd::class;
    case TDPBSUD = \PHPOS\Architecture\Operation\x86_64\Entity\Tdpbsud::class;
    case TDPBUSD = \PHPOS\Architecture\Operation\x86_64\Entity\Tdpbusd::class;
    case TDPBUUD = \PHPOS\Architecture\Operation\x86_64\Entity\Tdpbuud::class;
    case TEST = \PHPOS\Architecture\Operation\x86_64\Entity\Test::class;
    case TESTUI = \PHPOS\Architecture\Operation\x86_64\Entity\Testui::class;
    case TILELOADD = \PHPOS\Architecture\Operation\x86_64\Entity\Tileloadd::class;
    case TILELOADDT1 = \PHPOS\Architecture\Operation\x86_64\Entity\Tileloaddt1::class;
    case TILERELEASE = \PHPOS\Architecture\Operation\x86_64\Entity\Tilerelease::class;
    case TILESTORED = \PHPOS\Architecture\Operation\x86_64\Entity\Tilestored::class;
    case TILEZERO = \PHPOS\Architecture\Operation\x86_64\Entity\Tilezero::class;
    case TPAUSE = \PHPOS\Architecture\Operation\x86_64\Entity\Tpause::class;
    case TZCNT = \PHPOS\Architecture\Operation\x86_64\Entity\Tzcnt::class;
    case UCOMISD = \PHPOS\Architecture\Operation\x86_64\Entity\Ucomisd::class;
    case UCOMISS = \PHPOS\Architecture\Operation\x86_64\Entity\Ucomiss::class;
    case UD = \PHPOS\Architecture\Operation\x86_64\Entity\Ud::class;
    case UIRET = \PHPOS\Architecture\Operation\x86_64\Entity\Uiret::class;
    case UMONITOR = \PHPOS\Architecture\Operation\x86_64\Entity\Umonitor::class;
    case UMWAIT = \PHPOS\Architecture\Operation\x86_64\Entity\Umwait::class;
    case UNPCKHPD = \PHPOS\Architecture\Operation\x86_64\Entity\Unpckhpd::class;
    case UNPCKHPS = \PHPOS\Architecture\Operation\x86_64\Entity\Unpckhps::class;
    case UNPCKLPD = \PHPOS\Architecture\Operation\x86_64\Entity\Unpcklpd::class;
    case UNPCKLPS = \PHPOS\Architecture\Operation\x86_64\Entity\Unpcklps::class;
    case VADDPH = \PHPOS\Architecture\Operation\x86_64\Entity\Vaddph::class;
    case VADDSH = \PHPOS\Architecture\Operation\x86_64\Entity\Vaddsh::class;
    case VALIGND = \PHPOS\Architecture\Operation\x86_64\Entity\Valignd::class;
    case VALIGNQ = \PHPOS\Architecture\Operation\x86_64\Entity\Valignq::class;
    case VBLENDMPD = \PHPOS\Architecture\Operation\x86_64\Entity\Vblendmpd::class;
    case VBLENDMPS = \PHPOS\Architecture\Operation\x86_64\Entity\Vblendmps::class;
    case VBROADCAST = \PHPOS\Architecture\Operation\x86_64\Entity\Vbroadcast::class;
    case VCMPPH = \PHPOS\Architecture\Operation\x86_64\Entity\Vcmpph::class;
    case VCMPSH = \PHPOS\Architecture\Operation\x86_64\Entity\Vcmpsh::class;
    case VCOMISH = \PHPOS\Architecture\Operation\x86_64\Entity\Vcomish::class;
    case VCOMPRESSPD = \PHPOS\Architecture\Operation\x86_64\Entity\Vcompresspd::class;
    case VCOMPRESSPS = \PHPOS\Architecture\Operation\x86_64\Entity\Vcompressps::class;
    case VCOMPRESSW = \PHPOS\Architecture\Operation\x86_64\Entity\Vcompressw::class;
    case VCVTDQ2PH = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvtdq2ph::class;
    case VCVTNE2PS2BF16 = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvtne2ps2bf16::class;
    case VCVTNEPS2BF16 = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvtneps2bf16::class;
    case VCVTPD2PH = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvtpd2ph::class;
    case VCVTPD2QQ = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvtpd2qq::class;
    case VCVTPD2UDQ = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvtpd2udq::class;
    case VCVTPD2UQQ = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvtpd2uqq::class;
    case VCVTPH2DQ = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvtph2dq::class;
    case VCVTPH2PD = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvtph2pd::class;
    case VCVTPH2PS = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvtph2ps::class;
    case VCVTPH2PSX = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvtph2psx::class;
    case VCVTPH2QQ = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvtph2qq::class;
    case VCVTPH2UDQ = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvtph2udq::class;
    case VCVTPH2UQQ = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvtph2uqq::class;
    case VCVTPH2UW = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvtph2uw::class;
    case VCVTPH2W = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvtph2w::class;
    case VCVTPS2PH = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvtps2ph::class;
    case VCVTPS2PHX = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvtps2phx::class;
    case VCVTPS2QQ = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvtps2qq::class;
    case VCVTPS2UDQ = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvtps2udq::class;
    case VCVTPS2UQQ = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvtps2uqq::class;
    case VCVTQQ2PD = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvtqq2pd::class;
    case VCVTQQ2PH = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvtqq2ph::class;
    case VCVTQQ2PS = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvtqq2ps::class;
    case VCVTSD2SH = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvtsd2sh::class;
    case VCVTSD2USI = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvtsd2usi::class;
    case VCVTSH2SD = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvtsh2sd::class;
    case VCVTSH2SI = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvtsh2si::class;
    case VCVTSH2SS = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvtsh2ss::class;
    case VCVTSH2USI = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvtsh2usi::class;
    case VCVTSI2SH = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvtsi2sh::class;
    case VCVTSS2SH = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvtss2sh::class;
    case VCVTSS2USI = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvtss2usi::class;
    case VCVTTPD2QQ = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvttpd2qq::class;
    case VCVTTPD2UDQ = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvttpd2udq::class;
    case VCVTTPD2UQQ = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvttpd2uqq::class;
    case VCVTTPH2DQ = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvttph2dq::class;
    case VCVTTPH2QQ = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvttph2qq::class;
    case VCVTTPH2UDQ = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvttph2udq::class;
    case VCVTTPH2UQQ = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvttph2uqq::class;
    case VCVTTPH2UW = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvttph2uw::class;
    case VCVTTPH2W = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvttph2w::class;
    case VCVTTPS2QQ = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvttps2qq::class;
    case VCVTTPS2UDQ = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvttps2udq::class;
    case VCVTTPS2UQQ = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvttps2uqq::class;
    case VCVTTSD2USI = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvttsd2usi::class;
    case VCVTTSH2SI = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvttsh2si::class;
    case VCVTTSH2USI = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvttsh2usi::class;
    case VCVTTSS2USI = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvttss2usi::class;
    case VCVTUDQ2PD = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvtudq2pd::class;
    case VCVTUDQ2PH = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvtudq2ph::class;
    case VCVTUDQ2PS = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvtudq2ps::class;
    case VCVTUQQ2PD = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvtuqq2pd::class;
    case VCVTUQQ2PH = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvtuqq2ph::class;
    case VCVTUQQ2PS = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvtuqq2ps::class;
    case VCVTUSI2SD = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvtusi2sd::class;
    case VCVTUSI2SH = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvtusi2sh::class;
    case VCVTUSI2SS = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvtusi2ss::class;
    case VCVTUW2PH = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvtuw2ph::class;
    case VCVTW2PH = \PHPOS\Architecture\Operation\x86_64\Entity\Vcvtw2ph::class;
    case VDBPSADBW = \PHPOS\Architecture\Operation\x86_64\Entity\Vdbpsadbw::class;
    case VDIVPH = \PHPOS\Architecture\Operation\x86_64\Entity\Vdivph::class;
    case VDIVSH = \PHPOS\Architecture\Operation\x86_64\Entity\Vdivsh::class;
    case VDPBF16PS = \PHPOS\Architecture\Operation\x86_64\Entity\Vdpbf16ps::class;
    case VERR = \PHPOS\Architecture\Operation\x86_64\Entity\Verr::class;
    case VERW = \PHPOS\Architecture\Operation\x86_64\Entity\Verw::class;
    case VEXPANDPD = \PHPOS\Architecture\Operation\x86_64\Entity\Vexpandpd::class;
    case VEXPANDPS = \PHPOS\Architecture\Operation\x86_64\Entity\Vexpandps::class;
    case VEXTRACTF128 = \PHPOS\Architecture\Operation\x86_64\Entity\Vextractf128::class;
    case VEXTRACTF32X4 = \PHPOS\Architecture\Operation\x86_64\Entity\Vextractf32x4::class;
    case VEXTRACTF32X8 = \PHPOS\Architecture\Operation\x86_64\Entity\Vextractf32x8::class;
    case VEXTRACTF64X2 = \PHPOS\Architecture\Operation\x86_64\Entity\Vextractf64x2::class;
    case VEXTRACTF64X4 = \PHPOS\Architecture\Operation\x86_64\Entity\Vextractf64x4::class;
    case VEXTRACTI128 = \PHPOS\Architecture\Operation\x86_64\Entity\Vextracti128::class;
    case VEXTRACTI32X4 = \PHPOS\Architecture\Operation\x86_64\Entity\Vextracti32x4::class;
    case VEXTRACTI32X8 = \PHPOS\Architecture\Operation\x86_64\Entity\Vextracti32x8::class;
    case VEXTRACTI64X2 = \PHPOS\Architecture\Operation\x86_64\Entity\Vextracti64x2::class;
    case VEXTRACTI64X4 = \PHPOS\Architecture\Operation\x86_64\Entity\Vextracti64x4::class;
    case VFCMADDCPH = \PHPOS\Architecture\Operation\x86_64\Entity\Vfcmaddcph::class;
    case VFCMADDCSH = \PHPOS\Architecture\Operation\x86_64\Entity\Vfcmaddcsh::class;
    case VFCMULCPH = \PHPOS\Architecture\Operation\x86_64\Entity\Vfcmulcph::class;
    case VFCMULCSH = \PHPOS\Architecture\Operation\x86_64\Entity\Vfcmulcsh::class;
    case VFIXUPIMMPD = \PHPOS\Architecture\Operation\x86_64\Entity\Vfixupimmpd::class;
    case VFIXUPIMMPS = \PHPOS\Architecture\Operation\x86_64\Entity\Vfixupimmps::class;
    case VFIXUPIMMSD = \PHPOS\Architecture\Operation\x86_64\Entity\Vfixupimmsd::class;
    case VFIXUPIMMSS = \PHPOS\Architecture\Operation\x86_64\Entity\Vfixupimmss::class;
    case VFMADD132PD = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmadd132pd::class;
    case VFMADD132PH = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmadd132ph::class;
    case VFMADD132PS = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmadd132ps::class;
    case VFMADD132SD = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmadd132sd::class;
    case VFMADD132SH = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmadd132sh::class;
    case VFMADD132SS = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmadd132ss::class;
    case VFMADD213PD = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmadd213pd::class;
    case VFMADD213PH = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmadd213ph::class;
    case VFMADD213PS = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmadd213ps::class;
    case VFMADD213SD = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmadd213sd::class;
    case VFMADD213SH = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmadd213sh::class;
    case VFMADD213SS = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmadd213ss::class;
    case VFMADD231PD = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmadd231pd::class;
    case VFMADD231PH = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmadd231ph::class;
    case VFMADD231PS = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmadd231ps::class;
    case VFMADD231SD = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmadd231sd::class;
    case VFMADD231SH = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmadd231sh::class;
    case VFMADD231SS = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmadd231ss::class;
    case VFMADDCPH = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmaddcph::class;
    case VFMADDCSH = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmaddcsh::class;
    case VFMADDRND231PD = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmaddrnd231pd::class;
    case VFMADDSUB132PD = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmaddsub132pd::class;
    case VFMADDSUB132PH = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmaddsub132ph::class;
    case VFMADDSUB132PS = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmaddsub132ps::class;
    case VFMADDSUB213PD = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmaddsub213pd::class;
    case VFMADDSUB213PH = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmaddsub213ph::class;
    case VFMADDSUB213PS = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmaddsub213ps::class;
    case VFMADDSUB231PD = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmaddsub231pd::class;
    case VFMADDSUB231PH = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmaddsub231ph::class;
    case VFMADDSUB231PS = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmaddsub231ps::class;
    case VFMSUB132PD = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmsub132pd::class;
    case VFMSUB132PH = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmsub132ph::class;
    case VFMSUB132PS = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmsub132ps::class;
    case VFMSUB132SD = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmsub132sd::class;
    case VFMSUB132SH = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmsub132sh::class;
    case VFMSUB132SS = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmsub132ss::class;
    case VFMSUB213PD = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmsub213pd::class;
    case VFMSUB213PH = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmsub213ph::class;
    case VFMSUB213PS = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmsub213ps::class;
    case VFMSUB213SD = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmsub213sd::class;
    case VFMSUB213SH = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmsub213sh::class;
    case VFMSUB213SS = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmsub213ss::class;
    case VFMSUB231PD = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmsub231pd::class;
    case VFMSUB231PH = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmsub231ph::class;
    case VFMSUB231PS = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmsub231ps::class;
    case VFMSUB231SD = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmsub231sd::class;
    case VFMSUB231SH = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmsub231sh::class;
    case VFMSUB231SS = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmsub231ss::class;
    case VFMSUBADD132PD = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmsubadd132pd::class;
    case VFMSUBADD132PH = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmsubadd132ph::class;
    case VFMSUBADD132PS = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmsubadd132ps::class;
    case VFMSUBADD213PD = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmsubadd213pd::class;
    case VFMSUBADD213PH = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmsubadd213ph::class;
    case VFMSUBADD213PS = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmsubadd213ps::class;
    case VFMSUBADD231PD = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmsubadd231pd::class;
    case VFMSUBADD231PH = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmsubadd231ph::class;
    case VFMSUBADD231PS = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmsubadd231ps::class;
    case VFMULCPH = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmulcph::class;
    case VFMULCSH = \PHPOS\Architecture\Operation\x86_64\Entity\Vfmulcsh::class;
    case VFNMADD132PD = \PHPOS\Architecture\Operation\x86_64\Entity\Vfnmadd132pd::class;
    case VFNMADD132PH = \PHPOS\Architecture\Operation\x86_64\Entity\Vfnmadd132ph::class;
    case VFNMADD132PS = \PHPOS\Architecture\Operation\x86_64\Entity\Vfnmadd132ps::class;
    case VFNMADD132SD = \PHPOS\Architecture\Operation\x86_64\Entity\Vfnmadd132sd::class;
    case VFNMADD132SH = \PHPOS\Architecture\Operation\x86_64\Entity\Vfnmadd132sh::class;
    case VFNMADD132SS = \PHPOS\Architecture\Operation\x86_64\Entity\Vfnmadd132ss::class;
    case VFNMADD213PD = \PHPOS\Architecture\Operation\x86_64\Entity\Vfnmadd213pd::class;
    case VFNMADD213PH = \PHPOS\Architecture\Operation\x86_64\Entity\Vfnmadd213ph::class;
    case VFNMADD213PS = \PHPOS\Architecture\Operation\x86_64\Entity\Vfnmadd213ps::class;
    case VFNMADD213SD = \PHPOS\Architecture\Operation\x86_64\Entity\Vfnmadd213sd::class;
    case VFNMADD213SH = \PHPOS\Architecture\Operation\x86_64\Entity\Vfnmadd213sh::class;
    case VFNMADD213SS = \PHPOS\Architecture\Operation\x86_64\Entity\Vfnmadd213ss::class;
    case VFNMADD231PD = \PHPOS\Architecture\Operation\x86_64\Entity\Vfnmadd231pd::class;
    case VFNMADD231PH = \PHPOS\Architecture\Operation\x86_64\Entity\Vfnmadd231ph::class;
    case VFNMADD231PS = \PHPOS\Architecture\Operation\x86_64\Entity\Vfnmadd231ps::class;
    case VFNMADD231SD = \PHPOS\Architecture\Operation\x86_64\Entity\Vfnmadd231sd::class;
    case VFNMADD231SH = \PHPOS\Architecture\Operation\x86_64\Entity\Vfnmadd231sh::class;
    case VFNMADD231SS = \PHPOS\Architecture\Operation\x86_64\Entity\Vfnmadd231ss::class;
    case VFNMSUB132PD = \PHPOS\Architecture\Operation\x86_64\Entity\Vfnmsub132pd::class;
    case VFNMSUB132PH = \PHPOS\Architecture\Operation\x86_64\Entity\Vfnmsub132ph::class;
    case VFNMSUB132PS = \PHPOS\Architecture\Operation\x86_64\Entity\Vfnmsub132ps::class;
    case VFNMSUB132SD = \PHPOS\Architecture\Operation\x86_64\Entity\Vfnmsub132sd::class;
    case VFNMSUB132SH = \PHPOS\Architecture\Operation\x86_64\Entity\Vfnmsub132sh::class;
    case VFNMSUB132SS = \PHPOS\Architecture\Operation\x86_64\Entity\Vfnmsub132ss::class;
    case VFNMSUB213PD = \PHPOS\Architecture\Operation\x86_64\Entity\Vfnmsub213pd::class;
    case VFNMSUB213PH = \PHPOS\Architecture\Operation\x86_64\Entity\Vfnmsub213ph::class;
    case VFNMSUB213PS = \PHPOS\Architecture\Operation\x86_64\Entity\Vfnmsub213ps::class;
    case VFNMSUB213SD = \PHPOS\Architecture\Operation\x86_64\Entity\Vfnmsub213sd::class;
    case VFNMSUB213SH = \PHPOS\Architecture\Operation\x86_64\Entity\Vfnmsub213sh::class;
    case VFNMSUB213SS = \PHPOS\Architecture\Operation\x86_64\Entity\Vfnmsub213ss::class;
    case VFNMSUB231PD = \PHPOS\Architecture\Operation\x86_64\Entity\Vfnmsub231pd::class;
    case VFNMSUB231PH = \PHPOS\Architecture\Operation\x86_64\Entity\Vfnmsub231ph::class;
    case VFNMSUB231PS = \PHPOS\Architecture\Operation\x86_64\Entity\Vfnmsub231ps::class;
    case VFNMSUB231SD = \PHPOS\Architecture\Operation\x86_64\Entity\Vfnmsub231sd::class;
    case VFNMSUB231SH = \PHPOS\Architecture\Operation\x86_64\Entity\Vfnmsub231sh::class;
    case VFNMSUB231SS = \PHPOS\Architecture\Operation\x86_64\Entity\Vfnmsub231ss::class;
    case VFPCLASSPD = \PHPOS\Architecture\Operation\x86_64\Entity\Vfpclasspd::class;
    case VFPCLASSPH = \PHPOS\Architecture\Operation\x86_64\Entity\Vfpclassph::class;
    case VFPCLASSPS = \PHPOS\Architecture\Operation\x86_64\Entity\Vfpclassps::class;
    case VFPCLASSSD = \PHPOS\Architecture\Operation\x86_64\Entity\Vfpclasssd::class;
    case VFPCLASSSH = \PHPOS\Architecture\Operation\x86_64\Entity\Vfpclasssh::class;
    case VFPCLASSSS = \PHPOS\Architecture\Operation\x86_64\Entity\Vfpclassss::class;
    case VGATHERDPD = \PHPOS\Architecture\Operation\x86_64\Entity\Vgatherdpd::class;
    case VGATHERDPS = \PHPOS\Architecture\Operation\x86_64\Entity\Vgatherdps::class;
    case VGATHERQPD = \PHPOS\Architecture\Operation\x86_64\Entity\Vgatherqpd::class;
    case VGATHERQPS = \PHPOS\Architecture\Operation\x86_64\Entity\Vgatherqps::class;
    case VGETEXPPD = \PHPOS\Architecture\Operation\x86_64\Entity\Vgetexppd::class;
    case VGETEXPPH = \PHPOS\Architecture\Operation\x86_64\Entity\Vgetexpph::class;
    case VGETEXPPS = \PHPOS\Architecture\Operation\x86_64\Entity\Vgetexpps::class;
    case VGETEXPSD = \PHPOS\Architecture\Operation\x86_64\Entity\Vgetexpsd::class;
    case VGETEXPSH = \PHPOS\Architecture\Operation\x86_64\Entity\Vgetexpsh::class;
    case VGETEXPSS = \PHPOS\Architecture\Operation\x86_64\Entity\Vgetexpss::class;
    case VGETMANTPD = \PHPOS\Architecture\Operation\x86_64\Entity\Vgetmantpd::class;
    case VGETMANTPH = \PHPOS\Architecture\Operation\x86_64\Entity\Vgetmantph::class;
    case VGETMANTPS = \PHPOS\Architecture\Operation\x86_64\Entity\Vgetmantps::class;
    case VGETMANTSD = \PHPOS\Architecture\Operation\x86_64\Entity\Vgetmantsd::class;
    case VGETMANTSH = \PHPOS\Architecture\Operation\x86_64\Entity\Vgetmantsh::class;
    case VGETMANTSS = \PHPOS\Architecture\Operation\x86_64\Entity\Vgetmantss::class;
    case VINSERTF128 = \PHPOS\Architecture\Operation\x86_64\Entity\Vinsertf128::class;
    case VINSERTF32X4 = \PHPOS\Architecture\Operation\x86_64\Entity\Vinsertf32x4::class;
    case VINSERTF32X8 = \PHPOS\Architecture\Operation\x86_64\Entity\Vinsertf32x8::class;
    case VINSERTF64X2 = \PHPOS\Architecture\Operation\x86_64\Entity\Vinsertf64x2::class;
    case VINSERTF64X4 = \PHPOS\Architecture\Operation\x86_64\Entity\Vinsertf64x4::class;
    case VINSERTI128 = \PHPOS\Architecture\Operation\x86_64\Entity\Vinserti128::class;
    case VINSERTI32X4 = \PHPOS\Architecture\Operation\x86_64\Entity\Vinserti32x4::class;
    case VINSERTI32X8 = \PHPOS\Architecture\Operation\x86_64\Entity\Vinserti32x8::class;
    case VINSERTI64X2 = \PHPOS\Architecture\Operation\x86_64\Entity\Vinserti64x2::class;
    case VINSERTI64X4 = \PHPOS\Architecture\Operation\x86_64\Entity\Vinserti64x4::class;
    case VMASKMOV = \PHPOS\Architecture\Operation\x86_64\Entity\Vmaskmov::class;
    case VMAXPH = \PHPOS\Architecture\Operation\x86_64\Entity\Vmaxph::class;
    case VMAXSH = \PHPOS\Architecture\Operation\x86_64\Entity\Vmaxsh::class;
    case VMINPH = \PHPOS\Architecture\Operation\x86_64\Entity\Vminph::class;
    case VMINSH = \PHPOS\Architecture\Operation\x86_64\Entity\Vminsh::class;
    case VMOVDQA32 = \PHPOS\Architecture\Operation\x86_64\Entity\Vmovdqa32::class;
    case VMOVDQA64 = \PHPOS\Architecture\Operation\x86_64\Entity\Vmovdqa64::class;
    case VMOVDQU16 = \PHPOS\Architecture\Operation\x86_64\Entity\Vmovdqu16::class;
    case VMOVDQU32 = \PHPOS\Architecture\Operation\x86_64\Entity\Vmovdqu32::class;
    case VMOVDQU64 = \PHPOS\Architecture\Operation\x86_64\Entity\Vmovdqu64::class;
    case VMOVDQU8 = \PHPOS\Architecture\Operation\x86_64\Entity\Vmovdqu8::class;
    case VMOVSH = \PHPOS\Architecture\Operation\x86_64\Entity\Vmovsh::class;
    case VMOVW = \PHPOS\Architecture\Operation\x86_64\Entity\Vmovw::class;
    case VMULPH = \PHPOS\Architecture\Operation\x86_64\Entity\Vmulph::class;
    case VMULSH = \PHPOS\Architecture\Operation\x86_64\Entity\Vmulsh::class;
    case VP2INTERSECTD = \PHPOS\Architecture\Operation\x86_64\Entity\Vp2intersectd::class;
    case VP2INTERSECTQ = \PHPOS\Architecture\Operation\x86_64\Entity\Vp2intersectq::class;
    case VPBLENDD = \PHPOS\Architecture\Operation\x86_64\Entity\Vpblendd::class;
    case VPBLENDMB = \PHPOS\Architecture\Operation\x86_64\Entity\Vpblendmb::class;
    case VPBLENDMD = \PHPOS\Architecture\Operation\x86_64\Entity\Vpblendmd::class;
    case VPBLENDMQ = \PHPOS\Architecture\Operation\x86_64\Entity\Vpblendmq::class;
    case VPBLENDMW = \PHPOS\Architecture\Operation\x86_64\Entity\Vpblendmw::class;
    case VPBROADCAST = \PHPOS\Architecture\Operation\x86_64\Entity\Vpbroadcast::class;
    case VPBROADCASTB = \PHPOS\Architecture\Operation\x86_64\Entity\Vpbroadcastb::class;
    case VPBROADCASTD = \PHPOS\Architecture\Operation\x86_64\Entity\Vpbroadcastd::class;
    case VPBROADCASTM = \PHPOS\Architecture\Operation\x86_64\Entity\Vpbroadcastm::class;
    case VPBROADCASTQ = \PHPOS\Architecture\Operation\x86_64\Entity\Vpbroadcastq::class;
    case VPBROADCASTW = \PHPOS\Architecture\Operation\x86_64\Entity\Vpbroadcastw::class;
    case VPCMPB = \PHPOS\Architecture\Operation\x86_64\Entity\Vpcmpb::class;
    case VPCMPD = \PHPOS\Architecture\Operation\x86_64\Entity\Vpcmpd::class;
    case VPCMPQ = \PHPOS\Architecture\Operation\x86_64\Entity\Vpcmpq::class;
    case VPCMPUB = \PHPOS\Architecture\Operation\x86_64\Entity\Vpcmpub::class;
    case VPCMPUD = \PHPOS\Architecture\Operation\x86_64\Entity\Vpcmpud::class;
    case VPCMPUQ = \PHPOS\Architecture\Operation\x86_64\Entity\Vpcmpuq::class;
    case VPCMPUW = \PHPOS\Architecture\Operation\x86_64\Entity\Vpcmpuw::class;
    case VPCMPW = \PHPOS\Architecture\Operation\x86_64\Entity\Vpcmpw::class;
    case VPCOMPRESSB = \PHPOS\Architecture\Operation\x86_64\Entity\Vpcompressb::class;
    case VPCOMPRESSD = \PHPOS\Architecture\Operation\x86_64\Entity\Vpcompressd::class;
    case VPCOMPRESSQ = \PHPOS\Architecture\Operation\x86_64\Entity\Vpcompressq::class;
    case VPCONFLICTD = \PHPOS\Architecture\Operation\x86_64\Entity\Vpconflictd::class;
    case VPCONFLICTQ = \PHPOS\Architecture\Operation\x86_64\Entity\Vpconflictq::class;
    case VPDPBUSD = \PHPOS\Architecture\Operation\x86_64\Entity\Vpdpbusd::class;
    case VPDPBUSDS = \PHPOS\Architecture\Operation\x86_64\Entity\Vpdpbusds::class;
    case VPDPWSSD = \PHPOS\Architecture\Operation\x86_64\Entity\Vpdpwssd::class;
    case VPDPWSSDS = \PHPOS\Architecture\Operation\x86_64\Entity\Vpdpwssds::class;
    case VPERM2F128 = \PHPOS\Architecture\Operation\x86_64\Entity\Vperm2f128::class;
    case VPERM2I128 = \PHPOS\Architecture\Operation\x86_64\Entity\Vperm2i128::class;
    case VPERMB = \PHPOS\Architecture\Operation\x86_64\Entity\Vpermb::class;
    case VPERMD = \PHPOS\Architecture\Operation\x86_64\Entity\Vpermd::class;
    case VPERMI2B = \PHPOS\Architecture\Operation\x86_64\Entity\Vpermi2b::class;
    case VPERMI2D = \PHPOS\Architecture\Operation\x86_64\Entity\Vpermi2d::class;
    case VPERMI2PD = \PHPOS\Architecture\Operation\x86_64\Entity\Vpermi2pd::class;
    case VPERMI2PS = \PHPOS\Architecture\Operation\x86_64\Entity\Vpermi2ps::class;
    case VPERMI2Q = \PHPOS\Architecture\Operation\x86_64\Entity\Vpermi2q::class;
    case VPERMI2W = \PHPOS\Architecture\Operation\x86_64\Entity\Vpermi2w::class;
    case VPERMILPD = \PHPOS\Architecture\Operation\x86_64\Entity\Vpermilpd::class;
    case VPERMILPS = \PHPOS\Architecture\Operation\x86_64\Entity\Vpermilps::class;
    case VPERMPD = \PHPOS\Architecture\Operation\x86_64\Entity\Vpermpd::class;
    case VPERMPS = \PHPOS\Architecture\Operation\x86_64\Entity\Vpermps::class;
    case VPERMQ = \PHPOS\Architecture\Operation\x86_64\Entity\Vpermq::class;
    case VPERMT2B = \PHPOS\Architecture\Operation\x86_64\Entity\Vpermt2b::class;
    case VPERMT2D = \PHPOS\Architecture\Operation\x86_64\Entity\Vpermt2d::class;
    case VPERMT2PD = \PHPOS\Architecture\Operation\x86_64\Entity\Vpermt2pd::class;
    case VPERMT2PS = \PHPOS\Architecture\Operation\x86_64\Entity\Vpermt2ps::class;
    case VPERMT2Q = \PHPOS\Architecture\Operation\x86_64\Entity\Vpermt2q::class;
    case VPERMT2W = \PHPOS\Architecture\Operation\x86_64\Entity\Vpermt2w::class;
    case VPERMW = \PHPOS\Architecture\Operation\x86_64\Entity\Vpermw::class;
    case VPEXPANDB = \PHPOS\Architecture\Operation\x86_64\Entity\Vpexpandb::class;
    case VPEXPANDD = \PHPOS\Architecture\Operation\x86_64\Entity\Vpexpandd::class;
    case VPEXPANDQ = \PHPOS\Architecture\Operation\x86_64\Entity\Vpexpandq::class;
    case VPEXPANDW = \PHPOS\Architecture\Operation\x86_64\Entity\Vpexpandw::class;
    case VPGATHERDD = \PHPOS\Architecture\Operation\x86_64\Entity\Vpgatherdd::class;
    case VPGATHERDQ = \PHPOS\Architecture\Operation\x86_64\Entity\Vpgatherdq::class;
    case VPGATHERQD = \PHPOS\Architecture\Operation\x86_64\Entity\Vpgatherqd::class;
    case VPGATHERQQ = \PHPOS\Architecture\Operation\x86_64\Entity\Vpgatherqq::class;
    case VPLZCNTD = \PHPOS\Architecture\Operation\x86_64\Entity\Vplzcntd::class;
    case VPLZCNTQ = \PHPOS\Architecture\Operation\x86_64\Entity\Vplzcntq::class;
    case VPMADD52HUQ = \PHPOS\Architecture\Operation\x86_64\Entity\Vpmadd52huq::class;
    case VPMADD52LUQ = \PHPOS\Architecture\Operation\x86_64\Entity\Vpmadd52luq::class;
    case VPMASKMOV = \PHPOS\Architecture\Operation\x86_64\Entity\Vpmaskmov::class;
    case VPMOVB2M = \PHPOS\Architecture\Operation\x86_64\Entity\Vpmovb2m::class;
    case VPMOVD2M = \PHPOS\Architecture\Operation\x86_64\Entity\Vpmovd2m::class;
    case VPMOVDB = \PHPOS\Architecture\Operation\x86_64\Entity\Vpmovdb::class;
    case VPMOVDW = \PHPOS\Architecture\Operation\x86_64\Entity\Vpmovdw::class;
    case VPMOVM2B = \PHPOS\Architecture\Operation\x86_64\Entity\Vpmovm2b::class;
    case VPMOVM2D = \PHPOS\Architecture\Operation\x86_64\Entity\Vpmovm2d::class;
    case VPMOVM2Q = \PHPOS\Architecture\Operation\x86_64\Entity\Vpmovm2q::class;
    case VPMOVM2W = \PHPOS\Architecture\Operation\x86_64\Entity\Vpmovm2w::class;
    case VPMOVQ2M = \PHPOS\Architecture\Operation\x86_64\Entity\Vpmovq2m::class;
    case VPMOVQB = \PHPOS\Architecture\Operation\x86_64\Entity\Vpmovqb::class;
    case VPMOVQD = \PHPOS\Architecture\Operation\x86_64\Entity\Vpmovqd::class;
    case VPMOVQW = \PHPOS\Architecture\Operation\x86_64\Entity\Vpmovqw::class;
    case VPMOVSDB = \PHPOS\Architecture\Operation\x86_64\Entity\Vpmovsdb::class;
    case VPMOVSDW = \PHPOS\Architecture\Operation\x86_64\Entity\Vpmovsdw::class;
    case VPMOVSQB = \PHPOS\Architecture\Operation\x86_64\Entity\Vpmovsqb::class;
    case VPMOVSQD = \PHPOS\Architecture\Operation\x86_64\Entity\Vpmovsqd::class;
    case VPMOVSQW = \PHPOS\Architecture\Operation\x86_64\Entity\Vpmovsqw::class;
    case VPMOVSWB = \PHPOS\Architecture\Operation\x86_64\Entity\Vpmovswb::class;
    case VPMOVUSDB = \PHPOS\Architecture\Operation\x86_64\Entity\Vpmovusdb::class;
    case VPMOVUSDW = \PHPOS\Architecture\Operation\x86_64\Entity\Vpmovusdw::class;
    case VPMOVUSQB = \PHPOS\Architecture\Operation\x86_64\Entity\Vpmovusqb::class;
    case VPMOVUSQD = \PHPOS\Architecture\Operation\x86_64\Entity\Vpmovusqd::class;
    case VPMOVUSQW = \PHPOS\Architecture\Operation\x86_64\Entity\Vpmovusqw::class;
    case VPMOVUSWB = \PHPOS\Architecture\Operation\x86_64\Entity\Vpmovuswb::class;
    case VPMOVW2M = \PHPOS\Architecture\Operation\x86_64\Entity\Vpmovw2m::class;
    case VPMOVWB = \PHPOS\Architecture\Operation\x86_64\Entity\Vpmovwb::class;
    case VPMULTISHIFTQB = \PHPOS\Architecture\Operation\x86_64\Entity\Vpmultishiftqb::class;
    case VPOPCNT = \PHPOS\Architecture\Operation\x86_64\Entity\Vpopcnt::class;
    case VPROLD = \PHPOS\Architecture\Operation\x86_64\Entity\Vprold::class;
    case VPROLQ = \PHPOS\Architecture\Operation\x86_64\Entity\Vprolq::class;
    case VPROLVD = \PHPOS\Architecture\Operation\x86_64\Entity\Vprolvd::class;
    case VPROLVQ = \PHPOS\Architecture\Operation\x86_64\Entity\Vprolvq::class;
    case VPRORD = \PHPOS\Architecture\Operation\x86_64\Entity\Vprord::class;
    case VPRORQ = \PHPOS\Architecture\Operation\x86_64\Entity\Vprorq::class;
    case VPRORVD = \PHPOS\Architecture\Operation\x86_64\Entity\Vprorvd::class;
    case VPRORVQ = \PHPOS\Architecture\Operation\x86_64\Entity\Vprorvq::class;
    case VPSCATTERDD = \PHPOS\Architecture\Operation\x86_64\Entity\Vpscatterdd::class;
    case VPSCATTERDQ = \PHPOS\Architecture\Operation\x86_64\Entity\Vpscatterdq::class;
    case VPSCATTERQD = \PHPOS\Architecture\Operation\x86_64\Entity\Vpscatterqd::class;
    case VPSCATTERQQ = \PHPOS\Architecture\Operation\x86_64\Entity\Vpscatterqq::class;
    case VPSHLD = \PHPOS\Architecture\Operation\x86_64\Entity\Vpshld::class;
    case VPSHLDV = \PHPOS\Architecture\Operation\x86_64\Entity\Vpshldv::class;
    case VPSHRD = \PHPOS\Architecture\Operation\x86_64\Entity\Vpshrd::class;
    case VPSHRDV = \PHPOS\Architecture\Operation\x86_64\Entity\Vpshrdv::class;
    case VPSHUFBITQMB = \PHPOS\Architecture\Operation\x86_64\Entity\Vpshufbitqmb::class;
    case VPSLLVD = \PHPOS\Architecture\Operation\x86_64\Entity\Vpsllvd::class;
    case VPSLLVQ = \PHPOS\Architecture\Operation\x86_64\Entity\Vpsllvq::class;
    case VPSLLVW = \PHPOS\Architecture\Operation\x86_64\Entity\Vpsllvw::class;
    case VPSRAVD = \PHPOS\Architecture\Operation\x86_64\Entity\Vpsravd::class;
    case VPSRAVQ = \PHPOS\Architecture\Operation\x86_64\Entity\Vpsravq::class;
    case VPSRAVW = \PHPOS\Architecture\Operation\x86_64\Entity\Vpsravw::class;
    case VPSRLVD = \PHPOS\Architecture\Operation\x86_64\Entity\Vpsrlvd::class;
    case VPSRLVQ = \PHPOS\Architecture\Operation\x86_64\Entity\Vpsrlvq::class;
    case VPSRLVW = \PHPOS\Architecture\Operation\x86_64\Entity\Vpsrlvw::class;
    case VPTERNLOGD = \PHPOS\Architecture\Operation\x86_64\Entity\Vpternlogd::class;
    case VPTERNLOGQ = \PHPOS\Architecture\Operation\x86_64\Entity\Vpternlogq::class;
    case VPTESTMB = \PHPOS\Architecture\Operation\x86_64\Entity\Vptestmb::class;
    case VPTESTMD = \PHPOS\Architecture\Operation\x86_64\Entity\Vptestmd::class;
    case VPTESTMQ = \PHPOS\Architecture\Operation\x86_64\Entity\Vptestmq::class;
    case VPTESTMW = \PHPOS\Architecture\Operation\x86_64\Entity\Vptestmw::class;
    case VPTESTNMB = \PHPOS\Architecture\Operation\x86_64\Entity\Vptestnmb::class;
    case VPTESTNMD = \PHPOS\Architecture\Operation\x86_64\Entity\Vptestnmd::class;
    case VPTESTNMQ = \PHPOS\Architecture\Operation\x86_64\Entity\Vptestnmq::class;
    case VPTESTNMW = \PHPOS\Architecture\Operation\x86_64\Entity\Vptestnmw::class;
    case VRANGEPD = \PHPOS\Architecture\Operation\x86_64\Entity\Vrangepd::class;
    case VRANGEPS = \PHPOS\Architecture\Operation\x86_64\Entity\Vrangeps::class;
    case VRANGESD = \PHPOS\Architecture\Operation\x86_64\Entity\Vrangesd::class;
    case VRANGESS = \PHPOS\Architecture\Operation\x86_64\Entity\Vrangess::class;
    case VRCP14PD = \PHPOS\Architecture\Operation\x86_64\Entity\Vrcp14pd::class;
    case VRCP14PS = \PHPOS\Architecture\Operation\x86_64\Entity\Vrcp14ps::class;
    case VRCP14SD = \PHPOS\Architecture\Operation\x86_64\Entity\Vrcp14sd::class;
    case VRCP14SS = \PHPOS\Architecture\Operation\x86_64\Entity\Vrcp14ss::class;
    case VRCPPH = \PHPOS\Architecture\Operation\x86_64\Entity\Vrcpph::class;
    case VRCPSH = \PHPOS\Architecture\Operation\x86_64\Entity\Vrcpsh::class;
    case VREDUCEPD = \PHPOS\Architecture\Operation\x86_64\Entity\Vreducepd::class;
    case VREDUCEPH = \PHPOS\Architecture\Operation\x86_64\Entity\Vreduceph::class;
    case VREDUCEPS = \PHPOS\Architecture\Operation\x86_64\Entity\Vreduceps::class;
    case VREDUCESD = \PHPOS\Architecture\Operation\x86_64\Entity\Vreducesd::class;
    case VREDUCESH = \PHPOS\Architecture\Operation\x86_64\Entity\Vreducesh::class;
    case VREDUCESS = \PHPOS\Architecture\Operation\x86_64\Entity\Vreducess::class;
    case VRNDSCALEPD = \PHPOS\Architecture\Operation\x86_64\Entity\Vrndscalepd::class;
    case VRNDSCALEPH = \PHPOS\Architecture\Operation\x86_64\Entity\Vrndscaleph::class;
    case VRNDSCALEPS = \PHPOS\Architecture\Operation\x86_64\Entity\Vrndscaleps::class;
    case VRNDSCALESD = \PHPOS\Architecture\Operation\x86_64\Entity\Vrndscalesd::class;
    case VRNDSCALESH = \PHPOS\Architecture\Operation\x86_64\Entity\Vrndscalesh::class;
    case VRNDSCALESS = \PHPOS\Architecture\Operation\x86_64\Entity\Vrndscaless::class;
    case VRSQRT14PD = \PHPOS\Architecture\Operation\x86_64\Entity\Vrsqrt14pd::class;
    case VRSQRT14PS = \PHPOS\Architecture\Operation\x86_64\Entity\Vrsqrt14ps::class;
    case VRSQRT14SD = \PHPOS\Architecture\Operation\x86_64\Entity\Vrsqrt14sd::class;
    case VRSQRT14SS = \PHPOS\Architecture\Operation\x86_64\Entity\Vrsqrt14ss::class;
    case VRSQRTPH = \PHPOS\Architecture\Operation\x86_64\Entity\Vrsqrtph::class;
    case VRSQRTSH = \PHPOS\Architecture\Operation\x86_64\Entity\Vrsqrtsh::class;
    case VSCALEFPD = \PHPOS\Architecture\Operation\x86_64\Entity\Vscalefpd::class;
    case VSCALEFPH = \PHPOS\Architecture\Operation\x86_64\Entity\Vscalefph::class;
    case VSCALEFPS = \PHPOS\Architecture\Operation\x86_64\Entity\Vscalefps::class;
    case VSCALEFSD = \PHPOS\Architecture\Operation\x86_64\Entity\Vscalefsd::class;
    case VSCALEFSH = \PHPOS\Architecture\Operation\x86_64\Entity\Vscalefsh::class;
    case VSCALEFSS = \PHPOS\Architecture\Operation\x86_64\Entity\Vscalefss::class;
    case VSCATTERDPD = \PHPOS\Architecture\Operation\x86_64\Entity\Vscatterdpd::class;
    case VSCATTERDPS = \PHPOS\Architecture\Operation\x86_64\Entity\Vscatterdps::class;
    case VSCATTERQPD = \PHPOS\Architecture\Operation\x86_64\Entity\Vscatterqpd::class;
    case VSCATTERQPS = \PHPOS\Architecture\Operation\x86_64\Entity\Vscatterqps::class;
    case VSHUFF32X4 = \PHPOS\Architecture\Operation\x86_64\Entity\Vshuff32x4::class;
    case VSHUFF64X2 = \PHPOS\Architecture\Operation\x86_64\Entity\Vshuff64x2::class;
    case VSHUFI32X4 = \PHPOS\Architecture\Operation\x86_64\Entity\Vshufi32x4::class;
    case VSHUFI64X2 = \PHPOS\Architecture\Operation\x86_64\Entity\Vshufi64x2::class;
    case VSQRTPH = \PHPOS\Architecture\Operation\x86_64\Entity\Vsqrtph::class;
    case VSQRTSH = \PHPOS\Architecture\Operation\x86_64\Entity\Vsqrtsh::class;
    case VSUBPH = \PHPOS\Architecture\Operation\x86_64\Entity\Vsubph::class;
    case VSUBSH = \PHPOS\Architecture\Operation\x86_64\Entity\Vsubsh::class;
    case VTESTPD = \PHPOS\Architecture\Operation\x86_64\Entity\Vtestpd::class;
    case VTESTPS = \PHPOS\Architecture\Operation\x86_64\Entity\Vtestps::class;
    case VUCOMISH = \PHPOS\Architecture\Operation\x86_64\Entity\Vucomish::class;
    case VZEROALL = \PHPOS\Architecture\Operation\x86_64\Entity\Vzeroall::class;
    case VZEROUPPER = \PHPOS\Architecture\Operation\x86_64\Entity\Vzeroupper::class;
    case WAIT = \PHPOS\Architecture\Operation\x86_64\Entity\Wait::class;
    case WBINVD = \PHPOS\Architecture\Operation\x86_64\Entity\Wbinvd::class;
    case WBNOINVD = \PHPOS\Architecture\Operation\x86_64\Entity\Wbnoinvd::class;
    case WRFSBASE = \PHPOS\Architecture\Operation\x86_64\Entity\Wrfsbase::class;
    case WRGSBASE = \PHPOS\Architecture\Operation\x86_64\Entity\Wrgsbase::class;
    case WRMSR = \PHPOS\Architecture\Operation\x86_64\Entity\Wrmsr::class;
    case WRPKRU = \PHPOS\Architecture\Operation\x86_64\Entity\Wrpkru::class;
    case WRSSD = \PHPOS\Architecture\Operation\x86_64\Entity\Wrssd::class;
    case WRSSQ = \PHPOS\Architecture\Operation\x86_64\Entity\Wrssq::class;
    case WRUSSD = \PHPOS\Architecture\Operation\x86_64\Entity\Wrussd::class;
    case WRUSSQ = \PHPOS\Architecture\Operation\x86_64\Entity\Wrussq::class;
    case XABORT = \PHPOS\Architecture\Operation\x86_64\Entity\Xabort::class;
    case XACQUIRE = \PHPOS\Architecture\Operation\x86_64\Entity\Xacquire::class;
    case XADD = \PHPOS\Architecture\Operation\x86_64\Entity\Xadd::class;
    case XBEGIN = \PHPOS\Architecture\Operation\x86_64\Entity\Xbegin::class;
    case XCHG = \PHPOS\Architecture\Operation\x86_64\Entity\Xchg::class;
    case XEND = \PHPOS\Architecture\Operation\x86_64\Entity\Xend::class;
    case XGETBV = \PHPOS\Architecture\Operation\x86_64\Entity\Xgetbv::class;
    case XLAT = \PHPOS\Architecture\Operation\x86_64\Entity\Xlat::class;
    case XLATB = \PHPOS\Architecture\Operation\x86_64\Entity\Xlatb::class;
    case XOR_ = \PHPOS\Architecture\Operation\x86_64\Entity\Xor_::class;
    case XORPD = \PHPOS\Architecture\Operation\x86_64\Entity\Xorpd::class;
    case XORPS = \PHPOS\Architecture\Operation\x86_64\Entity\Xorps::class;
    case XRELEASE = \PHPOS\Architecture\Operation\x86_64\Entity\Xrelease::class;
    case XRESLDTRK = \PHPOS\Architecture\Operation\x86_64\Entity\Xresldtrk::class;
    case XRSTOR = \PHPOS\Architecture\Operation\x86_64\Entity\Xrstor::class;
    case XRSTORS = \PHPOS\Architecture\Operation\x86_64\Entity\Xrstors::class;
    case XSAVE = \PHPOS\Architecture\Operation\x86_64\Entity\Xsave::class;
    case XSAVEC = \PHPOS\Architecture\Operation\x86_64\Entity\Xsavec::class;
    case XSAVEOPT = \PHPOS\Architecture\Operation\x86_64\Entity\Xsaveopt::class;
    case XSAVES = \PHPOS\Architecture\Operation\x86_64\Entity\Xsaves::class;
    case XSETBV = \PHPOS\Architecture\Operation\x86_64\Entity\Xsetbv::class;
    case XSUSLDTRK = \PHPOS\Architecture\Operation\x86_64\Entity\Xsusldtrk::class;
    case XTEST = \PHPOS\Architecture\Operation\x86_64\Entity\Xtest::class;

    public function realName(): string
    {
        return rtrim(strtolower($this->name), '_');
    }

    public static function operations(): OperationCollection
    {
        return (new OperationCollection())
            ->bind(OperationType::AAA, self::AAA)
            ->bind(OperationType::AAD, self::AAD)
            ->bind(OperationType::AAM, self::AAM)
            ->bind(OperationType::AAS, self::AAS)
            ->bind(OperationType::ADC, self::ADC)
            ->bind(OperationType::ADCX, self::ADCX)
            ->bind(OperationType::ADD, self::ADD)
            ->bind(OperationType::ADDPD, self::ADDPD)
            ->bind(OperationType::ADDPS, self::ADDPS)
            ->bind(OperationType::ADDSD, self::ADDSD)
            ->bind(OperationType::ADDSS, self::ADDSS)
            ->bind(OperationType::ADDSUBPD, self::ADDSUBPD)
            ->bind(OperationType::ADDSUBPS, self::ADDSUBPS)
            ->bind(OperationType::ADOX, self::ADOX)
            ->bind(OperationType::AESDEC, self::AESDEC)
            ->bind(OperationType::AESDEC128KL, self::AESDEC128KL)
            ->bind(OperationType::AESDEC256KL, self::AESDEC256KL)
            ->bind(OperationType::AESDECLAST, self::AESDECLAST)
            ->bind(OperationType::AESDECWIDE128KL, self::AESDECWIDE128KL)
            ->bind(OperationType::AESDECWIDE256KL, self::AESDECWIDE256KL)
            ->bind(OperationType::AESENC, self::AESENC)
            ->bind(OperationType::AESENC128KL, self::AESENC128KL)
            ->bind(OperationType::AESENC256KL, self::AESENC256KL)
            ->bind(OperationType::AESENCLAST, self::AESENCLAST)
            ->bind(OperationType::AESENCWIDE128KL, self::AESENCWIDE128KL)
            ->bind(OperationType::AESENCWIDE256KL, self::AESENCWIDE256KL)
            ->bind(OperationType::AESIMC, self::AESIMC)
            ->bind(OperationType::AESKEYGENASSIST, self::AESKEYGENASSIST)
            ->bind(OperationType::AND_, self::AND_)
            ->bind(OperationType::ANDN, self::ANDN)
            ->bind(OperationType::ANDNPD, self::ANDNPD)
            ->bind(OperationType::ANDNPS, self::ANDNPS)
            ->bind(OperationType::ANDPD, self::ANDPD)
            ->bind(OperationType::ANDPS, self::ANDPS)
            ->bind(OperationType::ARPL, self::ARPL)
            ->bind(OperationType::BEXTR, self::BEXTR)
            ->bind(OperationType::BLENDPD, self::BLENDPD)
            ->bind(OperationType::BLENDPS, self::BLENDPS)
            ->bind(OperationType::BLENDVPD, self::BLENDVPD)
            ->bind(OperationType::BLENDVPS, self::BLENDVPS)
            ->bind(OperationType::BLSI, self::BLSI)
            ->bind(OperationType::BLSMSK, self::BLSMSK)
            ->bind(OperationType::BLSR, self::BLSR)
            ->bind(OperationType::BNDCL, self::BNDCL)
            ->bind(OperationType::BNDCN, self::BNDCN)
            ->bind(OperationType::BNDCU, self::BNDCU)
            ->bind(OperationType::BNDLDX, self::BNDLDX)
            ->bind(OperationType::BNDMK, self::BNDMK)
            ->bind(OperationType::BNDMOV, self::BNDMOV)
            ->bind(OperationType::BNDSTX, self::BNDSTX)
            ->bind(OperationType::BOUND, self::BOUND)
            ->bind(OperationType::BSF, self::BSF)
            ->bind(OperationType::BSR, self::BSR)
            ->bind(OperationType::BSWAP, self::BSWAP)
            ->bind(OperationType::BT, self::BT)
            ->bind(OperationType::BTC, self::BTC)
            ->bind(OperationType::BTR, self::BTR)
            ->bind(OperationType::BTS, self::BTS)
            ->bind(OperationType::BZHI, self::BZHI)
            ->bind(OperationType::CALL, self::CALL)
            ->bind(OperationType::CBW, self::CBW)
            ->bind(OperationType::CDQ, self::CDQ)
            ->bind(OperationType::CDQE, self::CDQE)
            ->bind(OperationType::CLAC, self::CLAC)
            ->bind(OperationType::CLC, self::CLC)
            ->bind(OperationType::CLD, self::CLD)
            ->bind(OperationType::CLDEMOTE, self::CLDEMOTE)
            ->bind(OperationType::CLFLUSH, self::CLFLUSH)
            ->bind(OperationType::CLFLUSHOPT, self::CLFLUSHOPT)
            ->bind(OperationType::CLI, self::CLI)
            ->bind(OperationType::CLRSSBSY, self::CLRSSBSY)
            ->bind(OperationType::CLTS, self::CLTS)
            ->bind(OperationType::CLUI, self::CLUI)
            ->bind(OperationType::CLWB, self::CLWB)
            ->bind(OperationType::CMC, self::CMC)
            ->bind(OperationType::CMOVCC, self::CMOVCC)
            ->bind(OperationType::CMP, self::CMP)
            ->bind(OperationType::CMPPD, self::CMPPD)
            ->bind(OperationType::CMPPS, self::CMPPS)
            ->bind(OperationType::CMPS, self::CMPS)
            ->bind(OperationType::CMPSB, self::CMPSB)
            ->bind(OperationType::CMPSD, self::CMPSD)
            ->bind(OperationType::CMPSQ, self::CMPSQ)
            ->bind(OperationType::CMPSS, self::CMPSS)
            ->bind(OperationType::CMPSW, self::CMPSW)
            ->bind(OperationType::CMPXCHG, self::CMPXCHG)
            ->bind(OperationType::CMPXCHG16B, self::CMPXCHG16B)
            ->bind(OperationType::CMPXCHG8B, self::CMPXCHG8B)
            ->bind(OperationType::COMISD, self::COMISD)
            ->bind(OperationType::COMISS, self::COMISS)
            ->bind(OperationType::CPUID, self::CPUID)
            ->bind(OperationType::CQO, self::CQO)
            ->bind(OperationType::CRC32, self::CRC32)
            ->bind(OperationType::CVTDQ2PD, self::CVTDQ2PD)
            ->bind(OperationType::CVTDQ2PS, self::CVTDQ2PS)
            ->bind(OperationType::CVTPD2DQ, self::CVTPD2DQ)
            ->bind(OperationType::CVTPD2PI, self::CVTPD2PI)
            ->bind(OperationType::CVTPD2PS, self::CVTPD2PS)
            ->bind(OperationType::CVTPI2PD, self::CVTPI2PD)
            ->bind(OperationType::CVTPI2PS, self::CVTPI2PS)
            ->bind(OperationType::CVTPS2DQ, self::CVTPS2DQ)
            ->bind(OperationType::CVTPS2PD, self::CVTPS2PD)
            ->bind(OperationType::CVTPS2PI, self::CVTPS2PI)
            ->bind(OperationType::CVTSD2SI, self::CVTSD2SI)
            ->bind(OperationType::CVTSD2SS, self::CVTSD2SS)
            ->bind(OperationType::CVTSI2SD, self::CVTSI2SD)
            ->bind(OperationType::CVTSI2SS, self::CVTSI2SS)
            ->bind(OperationType::CVTSS2SD, self::CVTSS2SD)
            ->bind(OperationType::CVTSS2SI, self::CVTSS2SI)
            ->bind(OperationType::CVTTPD2DQ, self::CVTTPD2DQ)
            ->bind(OperationType::CVTTPD2PI, self::CVTTPD2PI)
            ->bind(OperationType::CVTTPS2DQ, self::CVTTPS2DQ)
            ->bind(OperationType::CVTTPS2PI, self::CVTTPS2PI)
            ->bind(OperationType::CVTTSD2SI, self::CVTTSD2SI)
            ->bind(OperationType::CVTTSS2SI, self::CVTTSS2SI)
            ->bind(OperationType::CWD, self::CWD)
            ->bind(OperationType::CWDE, self::CWDE)
            ->bind(OperationType::DAA, self::DAA)
            ->bind(OperationType::DAS, self::DAS)
            ->bind(OperationType::DEC, self::DEC)
            ->bind(OperationType::DIV, self::DIV)
            ->bind(OperationType::DIVPD, self::DIVPD)
            ->bind(OperationType::DIVPS, self::DIVPS)
            ->bind(OperationType::DIVSD, self::DIVSD)
            ->bind(OperationType::DIVSS, self::DIVSS)
            ->bind(OperationType::DPPD, self::DPPD)
            ->bind(OperationType::DPPS, self::DPPS)
            ->bind(OperationType::EMMS, self::EMMS)
            ->bind(OperationType::ENCODEKEY128, self::ENCODEKEY128)
            ->bind(OperationType::ENCODEKEY256, self::ENCODEKEY256)
            ->bind(OperationType::ENDBR32, self::ENDBR32)
            ->bind(OperationType::ENDBR64, self::ENDBR64)
            ->bind(OperationType::ENQCMD, self::ENQCMD)
            ->bind(OperationType::ENQCMDS, self::ENQCMDS)
            ->bind(OperationType::ENTER, self::ENTER)
            ->bind(OperationType::EXTRACTPS, self::EXTRACTPS)
            ->bind(OperationType::F2XM1, self::F2XM1)
            ->bind(OperationType::FABS, self::FABS)
            ->bind(OperationType::FADD, self::FADD)
            ->bind(OperationType::FADDP, self::FADDP)
            ->bind(OperationType::FBLD, self::FBLD)
            ->bind(OperationType::FBSTP, self::FBSTP)
            ->bind(OperationType::FCHS, self::FCHS)
            ->bind(OperationType::FCLEX, self::FCLEX)
            ->bind(OperationType::FCMOVCC, self::FCMOVCC)
            ->bind(OperationType::FCOM, self::FCOM)
            ->bind(OperationType::FCOMI, self::FCOMI)
            ->bind(OperationType::FCOMIP, self::FCOMIP)
            ->bind(OperationType::FCOMP, self::FCOMP)
            ->bind(OperationType::FCOMPP, self::FCOMPP)
            ->bind(OperationType::FCOS, self::FCOS)
            ->bind(OperationType::FDECSTP, self::FDECSTP)
            ->bind(OperationType::FDIV, self::FDIV)
            ->bind(OperationType::FDIVP, self::FDIVP)
            ->bind(OperationType::FDIVR, self::FDIVR)
            ->bind(OperationType::FDIVRP, self::FDIVRP)
            ->bind(OperationType::FFREE, self::FFREE)
            ->bind(OperationType::FIADD, self::FIADD)
            ->bind(OperationType::FICOM, self::FICOM)
            ->bind(OperationType::FICOMP, self::FICOMP)
            ->bind(OperationType::FIDIV, self::FIDIV)
            ->bind(OperationType::FIDIVR, self::FIDIVR)
            ->bind(OperationType::FILD, self::FILD)
            ->bind(OperationType::FIMUL, self::FIMUL)
            ->bind(OperationType::FINCSTP, self::FINCSTP)
            ->bind(OperationType::FINIT, self::FINIT)
            ->bind(OperationType::FIST, self::FIST)
            ->bind(OperationType::FISTP, self::FISTP)
            ->bind(OperationType::FISTTP, self::FISTTP)
            ->bind(OperationType::FISUB, self::FISUB)
            ->bind(OperationType::FISUBR, self::FISUBR)
            ->bind(OperationType::FLD, self::FLD)
            ->bind(OperationType::FLD1, self::FLD1)
            ->bind(OperationType::FLDCW, self::FLDCW)
            ->bind(OperationType::FLDENV, self::FLDENV)
            ->bind(OperationType::FLDL2E, self::FLDL2E)
            ->bind(OperationType::FLDL2T, self::FLDL2T)
            ->bind(OperationType::FLDLG2, self::FLDLG2)
            ->bind(OperationType::FLDLN2, self::FLDLN2)
            ->bind(OperationType::FLDPI, self::FLDPI)
            ->bind(OperationType::FLDZ, self::FLDZ)
            ->bind(OperationType::FMUL, self::FMUL)
            ->bind(OperationType::FMULP, self::FMULP)
            ->bind(OperationType::FNCLEX, self::FNCLEX)
            ->bind(OperationType::FNINIT, self::FNINIT)
            ->bind(OperationType::FNOP, self::FNOP)
            ->bind(OperationType::FNSAVE, self::FNSAVE)
            ->bind(OperationType::FNSTCW, self::FNSTCW)
            ->bind(OperationType::FNSTENV, self::FNSTENV)
            ->bind(OperationType::FNSTSW, self::FNSTSW)
            ->bind(OperationType::FPATAN, self::FPATAN)
            ->bind(OperationType::FPREM, self::FPREM)
            ->bind(OperationType::FPREM1, self::FPREM1)
            ->bind(OperationType::FPTAN, self::FPTAN)
            ->bind(OperationType::FRNDINT, self::FRNDINT)
            ->bind(OperationType::FRSTOR, self::FRSTOR)
            ->bind(OperationType::FSAVE, self::FSAVE)
            ->bind(OperationType::FSCALE, self::FSCALE)
            ->bind(OperationType::FSIN, self::FSIN)
            ->bind(OperationType::FSINCOS, self::FSINCOS)
            ->bind(OperationType::FSQRT, self::FSQRT)
            ->bind(OperationType::FST, self::FST)
            ->bind(OperationType::FSTCW, self::FSTCW)
            ->bind(OperationType::FSTENV, self::FSTENV)
            ->bind(OperationType::FSTP, self::FSTP)
            ->bind(OperationType::FSTSW, self::FSTSW)
            ->bind(OperationType::FSUB, self::FSUB)
            ->bind(OperationType::FSUBP, self::FSUBP)
            ->bind(OperationType::FSUBR, self::FSUBR)
            ->bind(OperationType::FSUBRP, self::FSUBRP)
            ->bind(OperationType::FTST, self::FTST)
            ->bind(OperationType::FUCOM, self::FUCOM)
            ->bind(OperationType::FUCOMI, self::FUCOMI)
            ->bind(OperationType::FUCOMIP, self::FUCOMIP)
            ->bind(OperationType::FUCOMP, self::FUCOMP)
            ->bind(OperationType::FUCOMPP, self::FUCOMPP)
            ->bind(OperationType::FWAIT, self::FWAIT)
            ->bind(OperationType::FXAM, self::FXAM)
            ->bind(OperationType::FXCH, self::FXCH)
            ->bind(OperationType::FXRSTOR, self::FXRSTOR)
            ->bind(OperationType::FXSAVE, self::FXSAVE)
            ->bind(OperationType::FXTRACT, self::FXTRACT)
            ->bind(OperationType::FYL2X, self::FYL2X)
            ->bind(OperationType::FYL2XP1, self::FYL2XP1)
            ->bind(OperationType::GF2P8AFFINEINVQB, self::GF2P8AFFINEINVQB)
            ->bind(OperationType::GF2P8AFFINEQB, self::GF2P8AFFINEQB)
            ->bind(OperationType::GF2P8MULB, self::GF2P8MULB)
            ->bind(OperationType::HADDPD, self::HADDPD)
            ->bind(OperationType::HADDPS, self::HADDPS)
            ->bind(OperationType::HLT, self::HLT)
            ->bind(OperationType::HRESET, self::HRESET)
            ->bind(OperationType::HSUBPD, self::HSUBPD)
            ->bind(OperationType::HSUBPS, self::HSUBPS)
            ->bind(OperationType::IDIV, self::IDIV)
            ->bind(OperationType::IMUL, self::IMUL)
            ->bind(OperationType::IN, self::IN)
            ->bind(OperationType::INC, self::INC)
            ->bind(OperationType::INCSSPD, self::INCSSPD)
            ->bind(OperationType::INCSSPQ, self::INCSSPQ)
            ->bind(OperationType::INS, self::INS)
            ->bind(OperationType::INSB, self::INSB)
            ->bind(OperationType::INSD, self::INSD)
            ->bind(OperationType::INSERTPS, self::INSERTPS)
            ->bind(OperationType::INSW, self::INSW)
            ->bind(OperationType::INT_, self::INT_)
            ->bind(OperationType::INT1, self::INT1)
            ->bind(OperationType::INT3, self::INT3)
            ->bind(OperationType::INTO, self::INTO)
            ->bind(OperationType::INVD, self::INVD)
            ->bind(OperationType::INVLPG, self::INVLPG)
            ->bind(OperationType::INVPCID, self::INVPCID)
            ->bind(OperationType::IRET, self::IRET)
            ->bind(OperationType::IRETD, self::IRETD)
            ->bind(OperationType::IRETQ, self::IRETQ)
            ->bind(OperationType::JMP, self::JMP)
            ->bind(OperationType::JCC, self::JCC)
            ->bind(OperationType::KADDB, self::KADDB)
            ->bind(OperationType::KADDD, self::KADDD)
            ->bind(OperationType::KADDQ, self::KADDQ)
            ->bind(OperationType::KADDW, self::KADDW)
            ->bind(OperationType::KANDB, self::KANDB)
            ->bind(OperationType::KANDD, self::KANDD)
            ->bind(OperationType::KANDNB, self::KANDNB)
            ->bind(OperationType::KANDND, self::KANDND)
            ->bind(OperationType::KANDNQ, self::KANDNQ)
            ->bind(OperationType::KANDNW, self::KANDNW)
            ->bind(OperationType::KANDQ, self::KANDQ)
            ->bind(OperationType::KANDW, self::KANDW)
            ->bind(OperationType::KMOVB, self::KMOVB)
            ->bind(OperationType::KMOVD, self::KMOVD)
            ->bind(OperationType::KMOVQ, self::KMOVQ)
            ->bind(OperationType::KMOVW, self::KMOVW)
            ->bind(OperationType::KNOTB, self::KNOTB)
            ->bind(OperationType::KNOTD, self::KNOTD)
            ->bind(OperationType::KNOTQ, self::KNOTQ)
            ->bind(OperationType::KNOTW, self::KNOTW)
            ->bind(OperationType::KORB, self::KORB)
            ->bind(OperationType::KORD, self::KORD)
            ->bind(OperationType::KORQ, self::KORQ)
            ->bind(OperationType::KORTESTB, self::KORTESTB)
            ->bind(OperationType::KORTESTD, self::KORTESTD)
            ->bind(OperationType::KORTESTQ, self::KORTESTQ)
            ->bind(OperationType::KORTESTW, self::KORTESTW)
            ->bind(OperationType::KORW, self::KORW)
            ->bind(OperationType::KSHIFTLB, self::KSHIFTLB)
            ->bind(OperationType::KSHIFTLD, self::KSHIFTLD)
            ->bind(OperationType::KSHIFTLQ, self::KSHIFTLQ)
            ->bind(OperationType::KSHIFTLW, self::KSHIFTLW)
            ->bind(OperationType::KSHIFTRB, self::KSHIFTRB)
            ->bind(OperationType::KSHIFTRD, self::KSHIFTRD)
            ->bind(OperationType::KSHIFTRQ, self::KSHIFTRQ)
            ->bind(OperationType::KSHIFTRW, self::KSHIFTRW)
            ->bind(OperationType::KTESTB, self::KTESTB)
            ->bind(OperationType::KTESTD, self::KTESTD)
            ->bind(OperationType::KTESTQ, self::KTESTQ)
            ->bind(OperationType::KTESTW, self::KTESTW)
            ->bind(OperationType::KUNPCKBW, self::KUNPCKBW)
            ->bind(OperationType::KUNPCKDQ, self::KUNPCKDQ)
            ->bind(OperationType::KUNPCKWD, self::KUNPCKWD)
            ->bind(OperationType::KXNORB, self::KXNORB)
            ->bind(OperationType::KXNORD, self::KXNORD)
            ->bind(OperationType::KXNORQ, self::KXNORQ)
            ->bind(OperationType::KXNORW, self::KXNORW)
            ->bind(OperationType::KXORB, self::KXORB)
            ->bind(OperationType::KXORD, self::KXORD)
            ->bind(OperationType::KXORQ, self::KXORQ)
            ->bind(OperationType::KXORW, self::KXORW)
            ->bind(OperationType::LAHF, self::LAHF)
            ->bind(OperationType::LAR, self::LAR)
            ->bind(OperationType::LDDQU, self::LDDQU)
            ->bind(OperationType::LDMXCSR, self::LDMXCSR)
            ->bind(OperationType::LDS, self::LDS)
            ->bind(OperationType::LDTILECFG, self::LDTILECFG)
            ->bind(OperationType::LEA, self::LEA)
            ->bind(OperationType::LEAVE, self::LEAVE)
            ->bind(OperationType::LES, self::LES)
            ->bind(OperationType::LFENCE, self::LFENCE)
            ->bind(OperationType::LFS, self::LFS)
            ->bind(OperationType::LGDT, self::LGDT)
            ->bind(OperationType::LGS, self::LGS)
            ->bind(OperationType::LIDT, self::LIDT)
            ->bind(OperationType::LLDT, self::LLDT)
            ->bind(OperationType::LMSW, self::LMSW)
            ->bind(OperationType::LOADIWKEY, self::LOADIWKEY)
            ->bind(OperationType::LOCK, self::LOCK)
            ->bind(OperationType::LODS, self::LODS)
            ->bind(OperationType::LODSB, self::LODSB)
            ->bind(OperationType::LODSD, self::LODSD)
            ->bind(OperationType::LODSQ, self::LODSQ)
            ->bind(OperationType::LODSW, self::LODSW)
            ->bind(OperationType::LOOP, self::LOOP)
            ->bind(OperationType::LOOPCC, self::LOOPCC)
            ->bind(OperationType::LSL, self::LSL)
            ->bind(OperationType::LSS, self::LSS)
            ->bind(OperationType::LTR, self::LTR)
            ->bind(OperationType::LZCNT, self::LZCNT)
            ->bind(OperationType::MASKMOVDQU, self::MASKMOVDQU)
            ->bind(OperationType::MASKMOVQ, self::MASKMOVQ)
            ->bind(OperationType::MAXPD, self::MAXPD)
            ->bind(OperationType::MAXPS, self::MAXPS)
            ->bind(OperationType::MAXSD, self::MAXSD)
            ->bind(OperationType::MAXSS, self::MAXSS)
            ->bind(OperationType::MFENCE, self::MFENCE)
            ->bind(OperationType::MINPD, self::MINPD)
            ->bind(OperationType::MINPS, self::MINPS)
            ->bind(OperationType::MINSD, self::MINSD)
            ->bind(OperationType::MINSS, self::MINSS)
            ->bind(OperationType::MONITOR, self::MONITOR)
            ->bind(OperationType::MOV, self::MOV)
            ->bind(OperationType::MOVAPD, self::MOVAPD)
            ->bind(OperationType::MOVAPS, self::MOVAPS)
            ->bind(OperationType::MOVBE, self::MOVBE)
            ->bind(OperationType::MOVD, self::MOVD)
            ->bind(OperationType::MOVDDUP, self::MOVDDUP)
            ->bind(OperationType::MOVDIR64B, self::MOVDIR64B)
            ->bind(OperationType::MOVDIRI, self::MOVDIRI)
            ->bind(OperationType::MOVDQ2Q, self::MOVDQ2Q)
            ->bind(OperationType::MOVDQA, self::MOVDQA)
            ->bind(OperationType::MOVDQU, self::MOVDQU)
            ->bind(OperationType::MOVHLPS, self::MOVHLPS)
            ->bind(OperationType::MOVHPD, self::MOVHPD)
            ->bind(OperationType::MOVHPS, self::MOVHPS)
            ->bind(OperationType::MOVLHPS, self::MOVLHPS)
            ->bind(OperationType::MOVLPD, self::MOVLPD)
            ->bind(OperationType::MOVLPS, self::MOVLPS)
            ->bind(OperationType::MOVMSKPD, self::MOVMSKPD)
            ->bind(OperationType::MOVMSKPS, self::MOVMSKPS)
            ->bind(OperationType::MOVNTDQ, self::MOVNTDQ)
            ->bind(OperationType::MOVNTDQA, self::MOVNTDQA)
            ->bind(OperationType::MOVNTI, self::MOVNTI)
            ->bind(OperationType::MOVNTPD, self::MOVNTPD)
            ->bind(OperationType::MOVNTPS, self::MOVNTPS)
            ->bind(OperationType::MOVNTQ, self::MOVNTQ)
            ->bind(OperationType::MOVQ, self::MOVQ)
            ->bind(OperationType::MOVQ2DQ, self::MOVQ2DQ)
            ->bind(OperationType::MOVS, self::MOVS)
            ->bind(OperationType::MOVSB, self::MOVSB)
            ->bind(OperationType::MOVSD, self::MOVSD)
            ->bind(OperationType::MOVSHDUP, self::MOVSHDUP)
            ->bind(OperationType::MOVSLDUP, self::MOVSLDUP)
            ->bind(OperationType::MOVSQ, self::MOVSQ)
            ->bind(OperationType::MOVSS, self::MOVSS)
            ->bind(OperationType::MOVSW, self::MOVSW)
            ->bind(OperationType::MOVSX, self::MOVSX)
            ->bind(OperationType::MOVSXD, self::MOVSXD)
            ->bind(OperationType::MOVUPD, self::MOVUPD)
            ->bind(OperationType::MOVUPS, self::MOVUPS)
            ->bind(OperationType::MOVZX, self::MOVZX)
            ->bind(OperationType::MPSADBW, self::MPSADBW)
            ->bind(OperationType::MUL, self::MUL)
            ->bind(OperationType::MULPD, self::MULPD)
            ->bind(OperationType::MULPS, self::MULPS)
            ->bind(OperationType::MULSD, self::MULSD)
            ->bind(OperationType::MULSS, self::MULSS)
            ->bind(OperationType::MULX, self::MULX)
            ->bind(OperationType::MWAIT, self::MWAIT)
            ->bind(OperationType::NEG, self::NEG)
            ->bind(OperationType::NOP, self::NOP)
            ->bind(OperationType::NOT, self::NOT)
            ->bind(OperationType::OR_, self::OR_)
            ->bind(OperationType::ORPD, self::ORPD)
            ->bind(OperationType::ORPS, self::ORPS)
            ->bind(OperationType::OUT, self::OUT)
            ->bind(OperationType::OUTS, self::OUTS)
            ->bind(OperationType::OUTSB, self::OUTSB)
            ->bind(OperationType::OUTSD, self::OUTSD)
            ->bind(OperationType::OUTSW, self::OUTSW)
            ->bind(OperationType::PABSB, self::PABSB)
            ->bind(OperationType::PABSD, self::PABSD)
            ->bind(OperationType::PABSQ, self::PABSQ)
            ->bind(OperationType::PABSW, self::PABSW)
            ->bind(OperationType::PACKSSDW, self::PACKSSDW)
            ->bind(OperationType::PACKSSWB, self::PACKSSWB)
            ->bind(OperationType::PACKUSDW, self::PACKUSDW)
            ->bind(OperationType::PACKUSWB, self::PACKUSWB)
            ->bind(OperationType::PADDB, self::PADDB)
            ->bind(OperationType::PADDD, self::PADDD)
            ->bind(OperationType::PADDQ, self::PADDQ)
            ->bind(OperationType::PADDSB, self::PADDSB)
            ->bind(OperationType::PADDSW, self::PADDSW)
            ->bind(OperationType::PADDUSB, self::PADDUSB)
            ->bind(OperationType::PADDUSW, self::PADDUSW)
            ->bind(OperationType::PADDW, self::PADDW)
            ->bind(OperationType::PALIGNR, self::PALIGNR)
            ->bind(OperationType::PAND, self::PAND)
            ->bind(OperationType::PANDN, self::PANDN)
            ->bind(OperationType::PAUSE, self::PAUSE)
            ->bind(OperationType::PAVGB, self::PAVGB)
            ->bind(OperationType::PAVGW, self::PAVGW)
            ->bind(OperationType::PBLENDVB, self::PBLENDVB)
            ->bind(OperationType::PBLENDW, self::PBLENDW)
            ->bind(OperationType::PCLMULQDQ, self::PCLMULQDQ)
            ->bind(OperationType::PCMPEQB, self::PCMPEQB)
            ->bind(OperationType::PCMPEQD, self::PCMPEQD)
            ->bind(OperationType::PCMPEQQ, self::PCMPEQQ)
            ->bind(OperationType::PCMPEQW, self::PCMPEQW)
            ->bind(OperationType::PCMPESTRI, self::PCMPESTRI)
            ->bind(OperationType::PCMPESTRM, self::PCMPESTRM)
            ->bind(OperationType::PCMPGTB, self::PCMPGTB)
            ->bind(OperationType::PCMPGTD, self::PCMPGTD)
            ->bind(OperationType::PCMPGTQ, self::PCMPGTQ)
            ->bind(OperationType::PCMPGTW, self::PCMPGTW)
            ->bind(OperationType::PCMPISTRI, self::PCMPISTRI)
            ->bind(OperationType::PCMPISTRM, self::PCMPISTRM)
            ->bind(OperationType::PCONFIG, self::PCONFIG)
            ->bind(OperationType::PDEP, self::PDEP)
            ->bind(OperationType::PEXT, self::PEXT)
            ->bind(OperationType::PEXTRB, self::PEXTRB)
            ->bind(OperationType::PEXTRD, self::PEXTRD)
            ->bind(OperationType::PEXTRQ, self::PEXTRQ)
            ->bind(OperationType::PEXTRW, self::PEXTRW)
            ->bind(OperationType::PHADDD, self::PHADDD)
            ->bind(OperationType::PHADDSW, self::PHADDSW)
            ->bind(OperationType::PHADDW, self::PHADDW)
            ->bind(OperationType::PHMINPOSUW, self::PHMINPOSUW)
            ->bind(OperationType::PHSUBD, self::PHSUBD)
            ->bind(OperationType::PHSUBSW, self::PHSUBSW)
            ->bind(OperationType::PHSUBW, self::PHSUBW)
            ->bind(OperationType::PINSRB, self::PINSRB)
            ->bind(OperationType::PINSRD, self::PINSRD)
            ->bind(OperationType::PINSRQ, self::PINSRQ)
            ->bind(OperationType::PINSRW, self::PINSRW)
            ->bind(OperationType::PMADDUBSW, self::PMADDUBSW)
            ->bind(OperationType::PMADDWD, self::PMADDWD)
            ->bind(OperationType::PMAXSB, self::PMAXSB)
            ->bind(OperationType::PMAXSD, self::PMAXSD)
            ->bind(OperationType::PMAXSQ, self::PMAXSQ)
            ->bind(OperationType::PMAXSW, self::PMAXSW)
            ->bind(OperationType::PMAXUB, self::PMAXUB)
            ->bind(OperationType::PMAXUD, self::PMAXUD)
            ->bind(OperationType::PMAXUQ, self::PMAXUQ)
            ->bind(OperationType::PMAXUW, self::PMAXUW)
            ->bind(OperationType::PMINSB, self::PMINSB)
            ->bind(OperationType::PMINSD, self::PMINSD)
            ->bind(OperationType::PMINSQ, self::PMINSQ)
            ->bind(OperationType::PMINSW, self::PMINSW)
            ->bind(OperationType::PMINUB, self::PMINUB)
            ->bind(OperationType::PMINUD, self::PMINUD)
            ->bind(OperationType::PMINUQ, self::PMINUQ)
            ->bind(OperationType::PMINUW, self::PMINUW)
            ->bind(OperationType::PMOVMSKB, self::PMOVMSKB)
            ->bind(OperationType::PMOVSX, self::PMOVSX)
            ->bind(OperationType::PMOVZX, self::PMOVZX)
            ->bind(OperationType::PMULDQ, self::PMULDQ)
            ->bind(OperationType::PMULHRSW, self::PMULHRSW)
            ->bind(OperationType::PMULHUW, self::PMULHUW)
            ->bind(OperationType::PMULHW, self::PMULHW)
            ->bind(OperationType::PMULLD, self::PMULLD)
            ->bind(OperationType::PMULLQ, self::PMULLQ)
            ->bind(OperationType::PMULLW, self::PMULLW)
            ->bind(OperationType::PMULUDQ, self::PMULUDQ)
            ->bind(OperationType::POP, self::POP)
            ->bind(OperationType::POPA, self::POPA)
            ->bind(OperationType::POPAD, self::POPAD)
            ->bind(OperationType::POPCNT, self::POPCNT)
            ->bind(OperationType::POPF, self::POPF)
            ->bind(OperationType::POPFD, self::POPFD)
            ->bind(OperationType::POPFQ, self::POPFQ)
            ->bind(OperationType::POR, self::POR)
            ->bind(OperationType::PREFETCHW, self::PREFETCHW)
            ->bind(OperationType::PREFETCHH, self::PREFETCHH)
            ->bind(OperationType::PSADBW, self::PSADBW)
            ->bind(OperationType::PSHUFB, self::PSHUFB)
            ->bind(OperationType::PSHUFD, self::PSHUFD)
            ->bind(OperationType::PSHUFHW, self::PSHUFHW)
            ->bind(OperationType::PSHUFLW, self::PSHUFLW)
            ->bind(OperationType::PSHUFW, self::PSHUFW)
            ->bind(OperationType::PSIGNB, self::PSIGNB)
            ->bind(OperationType::PSIGND, self::PSIGND)
            ->bind(OperationType::PSIGNW, self::PSIGNW)
            ->bind(OperationType::PSLLD, self::PSLLD)
            ->bind(OperationType::PSLLDQ, self::PSLLDQ)
            ->bind(OperationType::PSLLQ, self::PSLLQ)
            ->bind(OperationType::PSLLW, self::PSLLW)
            ->bind(OperationType::PSRAD, self::PSRAD)
            ->bind(OperationType::PSRAQ, self::PSRAQ)
            ->bind(OperationType::PSRAW, self::PSRAW)
            ->bind(OperationType::PSRLD, self::PSRLD)
            ->bind(OperationType::PSRLDQ, self::PSRLDQ)
            ->bind(OperationType::PSRLQ, self::PSRLQ)
            ->bind(OperationType::PSRLW, self::PSRLW)
            ->bind(OperationType::PSUBB, self::PSUBB)
            ->bind(OperationType::PSUBD, self::PSUBD)
            ->bind(OperationType::PSUBQ, self::PSUBQ)
            ->bind(OperationType::PSUBSB, self::PSUBSB)
            ->bind(OperationType::PSUBSW, self::PSUBSW)
            ->bind(OperationType::PSUBUSB, self::PSUBUSB)
            ->bind(OperationType::PSUBUSW, self::PSUBUSW)
            ->bind(OperationType::PSUBW, self::PSUBW)
            ->bind(OperationType::PTEST, self::PTEST)
            ->bind(OperationType::PTWRITE, self::PTWRITE)
            ->bind(OperationType::PUNPCKHBW, self::PUNPCKHBW)
            ->bind(OperationType::PUNPCKHDQ, self::PUNPCKHDQ)
            ->bind(OperationType::PUNPCKHQDQ, self::PUNPCKHQDQ)
            ->bind(OperationType::PUNPCKHWD, self::PUNPCKHWD)
            ->bind(OperationType::PUNPCKLBW, self::PUNPCKLBW)
            ->bind(OperationType::PUNPCKLDQ, self::PUNPCKLDQ)
            ->bind(OperationType::PUNPCKLQDQ, self::PUNPCKLQDQ)
            ->bind(OperationType::PUNPCKLWD, self::PUNPCKLWD)
            ->bind(OperationType::PUSH, self::PUSH)
            ->bind(OperationType::PUSHA, self::PUSHA)
            ->bind(OperationType::PUSHAD, self::PUSHAD)
            ->bind(OperationType::PUSHF, self::PUSHF)
            ->bind(OperationType::PUSHFD, self::PUSHFD)
            ->bind(OperationType::PUSHFQ, self::PUSHFQ)
            ->bind(OperationType::PXOR, self::PXOR)
            ->bind(OperationType::RCL, self::RCL)
            ->bind(OperationType::RCPPS, self::RCPPS)
            ->bind(OperationType::RCPSS, self::RCPSS)
            ->bind(OperationType::RCR, self::RCR)
            ->bind(OperationType::RDFSBASE, self::RDFSBASE)
            ->bind(OperationType::RDGSBASE, self::RDGSBASE)
            ->bind(OperationType::RDMSR, self::RDMSR)
            ->bind(OperationType::RDPID, self::RDPID)
            ->bind(OperationType::RDPKRU, self::RDPKRU)
            ->bind(OperationType::RDPMC, self::RDPMC)
            ->bind(OperationType::RDRAND, self::RDRAND)
            ->bind(OperationType::RDSEED, self::RDSEED)
            ->bind(OperationType::RDSSPD, self::RDSSPD)
            ->bind(OperationType::RDSSPQ, self::RDSSPQ)
            ->bind(OperationType::RDTSC, self::RDTSC)
            ->bind(OperationType::RDTSCP, self::RDTSCP)
            ->bind(OperationType::REP, self::REP)
            ->bind(OperationType::REPE, self::REPE)
            ->bind(OperationType::REPNE, self::REPNE)
            ->bind(OperationType::REPNZ, self::REPNZ)
            ->bind(OperationType::REPZ, self::REPZ)
            ->bind(OperationType::RET, self::RET)
            ->bind(OperationType::ROL, self::ROL)
            ->bind(OperationType::ROR, self::ROR)
            ->bind(OperationType::RORX, self::RORX)
            ->bind(OperationType::ROUNDPD, self::ROUNDPD)
            ->bind(OperationType::ROUNDPS, self::ROUNDPS)
            ->bind(OperationType::ROUNDSD, self::ROUNDSD)
            ->bind(OperationType::ROUNDSS, self::ROUNDSS)
            ->bind(OperationType::RSM, self::RSM)
            ->bind(OperationType::RSQRTPS, self::RSQRTPS)
            ->bind(OperationType::RSQRTSS, self::RSQRTSS)
            ->bind(OperationType::RSTORSSP, self::RSTORSSP)
            ->bind(OperationType::SAHF, self::SAHF)
            ->bind(OperationType::SAL, self::SAL)
            ->bind(OperationType::SAR, self::SAR)
            ->bind(OperationType::SARX, self::SARX)
            ->bind(OperationType::SAVEPREVSSP, self::SAVEPREVSSP)
            ->bind(OperationType::SBB, self::SBB)
            ->bind(OperationType::SCAS, self::SCAS)
            ->bind(OperationType::SCASB, self::SCASB)
            ->bind(OperationType::SCASD, self::SCASD)
            ->bind(OperationType::SCASW, self::SCASW)
            ->bind(OperationType::SENDUIPI, self::SENDUIPI)
            ->bind(OperationType::SERIALIZE, self::SERIALIZE)
            ->bind(OperationType::SETSSBSY, self::SETSSBSY)
            ->bind(OperationType::SETCC, self::SETCC)
            ->bind(OperationType::SFENCE, self::SFENCE)
            ->bind(OperationType::SGDT, self::SGDT)
            ->bind(OperationType::SHA1MSG1, self::SHA1MSG1)
            ->bind(OperationType::SHA1MSG2, self::SHA1MSG2)
            ->bind(OperationType::SHA1NEXTE, self::SHA1NEXTE)
            ->bind(OperationType::SHA1RNDS4, self::SHA1RNDS4)
            ->bind(OperationType::SHA256MSG1, self::SHA256MSG1)
            ->bind(OperationType::SHA256MSG2, self::SHA256MSG2)
            ->bind(OperationType::SHA256RNDS2, self::SHA256RNDS2)
            ->bind(OperationType::SHL, self::SHL)
            ->bind(OperationType::SHLD, self::SHLD)
            ->bind(OperationType::SHLX, self::SHLX)
            ->bind(OperationType::SHR, self::SHR)
            ->bind(OperationType::SHRD, self::SHRD)
            ->bind(OperationType::SHRX, self::SHRX)
            ->bind(OperationType::SHUFPD, self::SHUFPD)
            ->bind(OperationType::SHUFPS, self::SHUFPS)
            ->bind(OperationType::SIDT, self::SIDT)
            ->bind(OperationType::SLDT, self::SLDT)
            ->bind(OperationType::SMSW, self::SMSW)
            ->bind(OperationType::SQRTPD, self::SQRTPD)
            ->bind(OperationType::SQRTPS, self::SQRTPS)
            ->bind(OperationType::SQRTSD, self::SQRTSD)
            ->bind(OperationType::SQRTSS, self::SQRTSS)
            ->bind(OperationType::STAC, self::STAC)
            ->bind(OperationType::STC, self::STC)
            ->bind(OperationType::STD, self::STD)
            ->bind(OperationType::STI, self::STI)
            ->bind(OperationType::STMXCSR, self::STMXCSR)
            ->bind(OperationType::STOS, self::STOS)
            ->bind(OperationType::STOSB, self::STOSB)
            ->bind(OperationType::STOSD, self::STOSD)
            ->bind(OperationType::STOSQ, self::STOSQ)
            ->bind(OperationType::STOSW, self::STOSW)
            ->bind(OperationType::STR, self::STR)
            ->bind(OperationType::STTILECFG, self::STTILECFG)
            ->bind(OperationType::STUI, self::STUI)
            ->bind(OperationType::SUB, self::SUB)
            ->bind(OperationType::SUBPD, self::SUBPD)
            ->bind(OperationType::SUBPS, self::SUBPS)
            ->bind(OperationType::SUBSD, self::SUBSD)
            ->bind(OperationType::SUBSS, self::SUBSS)
            ->bind(OperationType::SWAPGS, self::SWAPGS)
            ->bind(OperationType::SYSCALL, self::SYSCALL)
            ->bind(OperationType::SYSENTER, self::SYSENTER)
            ->bind(OperationType::SYSEXIT, self::SYSEXIT)
            ->bind(OperationType::SYSRET, self::SYSRET)
            ->bind(OperationType::TDPBF16PS, self::TDPBF16PS)
            ->bind(OperationType::TDPBSSD, self::TDPBSSD)
            ->bind(OperationType::TDPBSUD, self::TDPBSUD)
            ->bind(OperationType::TDPBUSD, self::TDPBUSD)
            ->bind(OperationType::TDPBUUD, self::TDPBUUD)
            ->bind(OperationType::TEST, self::TEST)
            ->bind(OperationType::TESTUI, self::TESTUI)
            ->bind(OperationType::TILELOADD, self::TILELOADD)
            ->bind(OperationType::TILELOADDT1, self::TILELOADDT1)
            ->bind(OperationType::TILERELEASE, self::TILERELEASE)
            ->bind(OperationType::TILESTORED, self::TILESTORED)
            ->bind(OperationType::TILEZERO, self::TILEZERO)
            ->bind(OperationType::TPAUSE, self::TPAUSE)
            ->bind(OperationType::TZCNT, self::TZCNT)
            ->bind(OperationType::UCOMISD, self::UCOMISD)
            ->bind(OperationType::UCOMISS, self::UCOMISS)
            ->bind(OperationType::UD, self::UD)
            ->bind(OperationType::UIRET, self::UIRET)
            ->bind(OperationType::UMONITOR, self::UMONITOR)
            ->bind(OperationType::UMWAIT, self::UMWAIT)
            ->bind(OperationType::UNPCKHPD, self::UNPCKHPD)
            ->bind(OperationType::UNPCKHPS, self::UNPCKHPS)
            ->bind(OperationType::UNPCKLPD, self::UNPCKLPD)
            ->bind(OperationType::UNPCKLPS, self::UNPCKLPS)
            ->bind(OperationType::VADDPH, self::VADDPH)
            ->bind(OperationType::VADDSH, self::VADDSH)
            ->bind(OperationType::VALIGND, self::VALIGND)
            ->bind(OperationType::VALIGNQ, self::VALIGNQ)
            ->bind(OperationType::VBLENDMPD, self::VBLENDMPD)
            ->bind(OperationType::VBLENDMPS, self::VBLENDMPS)
            ->bind(OperationType::VBROADCAST, self::VBROADCAST)
            ->bind(OperationType::VCMPPH, self::VCMPPH)
            ->bind(OperationType::VCMPSH, self::VCMPSH)
            ->bind(OperationType::VCOMISH, self::VCOMISH)
            ->bind(OperationType::VCOMPRESSPD, self::VCOMPRESSPD)
            ->bind(OperationType::VCOMPRESSPS, self::VCOMPRESSPS)
            ->bind(OperationType::VCOMPRESSW, self::VCOMPRESSW)
            ->bind(OperationType::VCVTDQ2PH, self::VCVTDQ2PH)
            ->bind(OperationType::VCVTNE2PS2BF16, self::VCVTNE2PS2BF16)
            ->bind(OperationType::VCVTNEPS2BF16, self::VCVTNEPS2BF16)
            ->bind(OperationType::VCVTPD2PH, self::VCVTPD2PH)
            ->bind(OperationType::VCVTPD2QQ, self::VCVTPD2QQ)
            ->bind(OperationType::VCVTPD2UDQ, self::VCVTPD2UDQ)
            ->bind(OperationType::VCVTPD2UQQ, self::VCVTPD2UQQ)
            ->bind(OperationType::VCVTPH2DQ, self::VCVTPH2DQ)
            ->bind(OperationType::VCVTPH2PD, self::VCVTPH2PD)
            ->bind(OperationType::VCVTPH2PS, self::VCVTPH2PS)
            ->bind(OperationType::VCVTPH2PSX, self::VCVTPH2PSX)
            ->bind(OperationType::VCVTPH2QQ, self::VCVTPH2QQ)
            ->bind(OperationType::VCVTPH2UDQ, self::VCVTPH2UDQ)
            ->bind(OperationType::VCVTPH2UQQ, self::VCVTPH2UQQ)
            ->bind(OperationType::VCVTPH2UW, self::VCVTPH2UW)
            ->bind(OperationType::VCVTPH2W, self::VCVTPH2W)
            ->bind(OperationType::VCVTPS2PH, self::VCVTPS2PH)
            ->bind(OperationType::VCVTPS2PHX, self::VCVTPS2PHX)
            ->bind(OperationType::VCVTPS2QQ, self::VCVTPS2QQ)
            ->bind(OperationType::VCVTPS2UDQ, self::VCVTPS2UDQ)
            ->bind(OperationType::VCVTPS2UQQ, self::VCVTPS2UQQ)
            ->bind(OperationType::VCVTQQ2PD, self::VCVTQQ2PD)
            ->bind(OperationType::VCVTQQ2PH, self::VCVTQQ2PH)
            ->bind(OperationType::VCVTQQ2PS, self::VCVTQQ2PS)
            ->bind(OperationType::VCVTSD2SH, self::VCVTSD2SH)
            ->bind(OperationType::VCVTSD2USI, self::VCVTSD2USI)
            ->bind(OperationType::VCVTSH2SD, self::VCVTSH2SD)
            ->bind(OperationType::VCVTSH2SI, self::VCVTSH2SI)
            ->bind(OperationType::VCVTSH2SS, self::VCVTSH2SS)
            ->bind(OperationType::VCVTSH2USI, self::VCVTSH2USI)
            ->bind(OperationType::VCVTSI2SH, self::VCVTSI2SH)
            ->bind(OperationType::VCVTSS2SH, self::VCVTSS2SH)
            ->bind(OperationType::VCVTSS2USI, self::VCVTSS2USI)
            ->bind(OperationType::VCVTTPD2QQ, self::VCVTTPD2QQ)
            ->bind(OperationType::VCVTTPD2UDQ, self::VCVTTPD2UDQ)
            ->bind(OperationType::VCVTTPD2UQQ, self::VCVTTPD2UQQ)
            ->bind(OperationType::VCVTTPH2DQ, self::VCVTTPH2DQ)
            ->bind(OperationType::VCVTTPH2QQ, self::VCVTTPH2QQ)
            ->bind(OperationType::VCVTTPH2UDQ, self::VCVTTPH2UDQ)
            ->bind(OperationType::VCVTTPH2UQQ, self::VCVTTPH2UQQ)
            ->bind(OperationType::VCVTTPH2UW, self::VCVTTPH2UW)
            ->bind(OperationType::VCVTTPH2W, self::VCVTTPH2W)
            ->bind(OperationType::VCVTTPS2QQ, self::VCVTTPS2QQ)
            ->bind(OperationType::VCVTTPS2UDQ, self::VCVTTPS2UDQ)
            ->bind(OperationType::VCVTTPS2UQQ, self::VCVTTPS2UQQ)
            ->bind(OperationType::VCVTTSD2USI, self::VCVTTSD2USI)
            ->bind(OperationType::VCVTTSH2SI, self::VCVTTSH2SI)
            ->bind(OperationType::VCVTTSH2USI, self::VCVTTSH2USI)
            ->bind(OperationType::VCVTTSS2USI, self::VCVTTSS2USI)
            ->bind(OperationType::VCVTUDQ2PD, self::VCVTUDQ2PD)
            ->bind(OperationType::VCVTUDQ2PH, self::VCVTUDQ2PH)
            ->bind(OperationType::VCVTUDQ2PS, self::VCVTUDQ2PS)
            ->bind(OperationType::VCVTUQQ2PD, self::VCVTUQQ2PD)
            ->bind(OperationType::VCVTUQQ2PH, self::VCVTUQQ2PH)
            ->bind(OperationType::VCVTUQQ2PS, self::VCVTUQQ2PS)
            ->bind(OperationType::VCVTUSI2SD, self::VCVTUSI2SD)
            ->bind(OperationType::VCVTUSI2SH, self::VCVTUSI2SH)
            ->bind(OperationType::VCVTUSI2SS, self::VCVTUSI2SS)
            ->bind(OperationType::VCVTUW2PH, self::VCVTUW2PH)
            ->bind(OperationType::VCVTW2PH, self::VCVTW2PH)
            ->bind(OperationType::VDBPSADBW, self::VDBPSADBW)
            ->bind(OperationType::VDIVPH, self::VDIVPH)
            ->bind(OperationType::VDIVSH, self::VDIVSH)
            ->bind(OperationType::VDPBF16PS, self::VDPBF16PS)
            ->bind(OperationType::VERR, self::VERR)
            ->bind(OperationType::VERW, self::VERW)
            ->bind(OperationType::VEXPANDPD, self::VEXPANDPD)
            ->bind(OperationType::VEXPANDPS, self::VEXPANDPS)
            ->bind(OperationType::VEXTRACTF128, self::VEXTRACTF128)
            ->bind(OperationType::VEXTRACTF32X4, self::VEXTRACTF32X4)
            ->bind(OperationType::VEXTRACTF32X8, self::VEXTRACTF32X8)
            ->bind(OperationType::VEXTRACTF64X2, self::VEXTRACTF64X2)
            ->bind(OperationType::VEXTRACTF64X4, self::VEXTRACTF64X4)
            ->bind(OperationType::VEXTRACTI128, self::VEXTRACTI128)
            ->bind(OperationType::VEXTRACTI32X4, self::VEXTRACTI32X4)
            ->bind(OperationType::VEXTRACTI32X8, self::VEXTRACTI32X8)
            ->bind(OperationType::VEXTRACTI64X2, self::VEXTRACTI64X2)
            ->bind(OperationType::VEXTRACTI64X4, self::VEXTRACTI64X4)
            ->bind(OperationType::VFCMADDCPH, self::VFCMADDCPH)
            ->bind(OperationType::VFCMADDCSH, self::VFCMADDCSH)
            ->bind(OperationType::VFCMULCPH, self::VFCMULCPH)
            ->bind(OperationType::VFCMULCSH, self::VFCMULCSH)
            ->bind(OperationType::VFIXUPIMMPD, self::VFIXUPIMMPD)
            ->bind(OperationType::VFIXUPIMMPS, self::VFIXUPIMMPS)
            ->bind(OperationType::VFIXUPIMMSD, self::VFIXUPIMMSD)
            ->bind(OperationType::VFIXUPIMMSS, self::VFIXUPIMMSS)
            ->bind(OperationType::VFMADD132PD, self::VFMADD132PD)
            ->bind(OperationType::VFMADD132PH, self::VFMADD132PH)
            ->bind(OperationType::VFMADD132PS, self::VFMADD132PS)
            ->bind(OperationType::VFMADD132SD, self::VFMADD132SD)
            ->bind(OperationType::VFMADD132SH, self::VFMADD132SH)
            ->bind(OperationType::VFMADD132SS, self::VFMADD132SS)
            ->bind(OperationType::VFMADD213PD, self::VFMADD213PD)
            ->bind(OperationType::VFMADD213PH, self::VFMADD213PH)
            ->bind(OperationType::VFMADD213PS, self::VFMADD213PS)
            ->bind(OperationType::VFMADD213SD, self::VFMADD213SD)
            ->bind(OperationType::VFMADD213SH, self::VFMADD213SH)
            ->bind(OperationType::VFMADD213SS, self::VFMADD213SS)
            ->bind(OperationType::VFMADD231PD, self::VFMADD231PD)
            ->bind(OperationType::VFMADD231PH, self::VFMADD231PH)
            ->bind(OperationType::VFMADD231PS, self::VFMADD231PS)
            ->bind(OperationType::VFMADD231SD, self::VFMADD231SD)
            ->bind(OperationType::VFMADD231SH, self::VFMADD231SH)
            ->bind(OperationType::VFMADD231SS, self::VFMADD231SS)
            ->bind(OperationType::VFMADDCPH, self::VFMADDCPH)
            ->bind(OperationType::VFMADDCSH, self::VFMADDCSH)
            ->bind(OperationType::VFMADDRND231PD, self::VFMADDRND231PD)
            ->bind(OperationType::VFMADDSUB132PD, self::VFMADDSUB132PD)
            ->bind(OperationType::VFMADDSUB132PH, self::VFMADDSUB132PH)
            ->bind(OperationType::VFMADDSUB132PS, self::VFMADDSUB132PS)
            ->bind(OperationType::VFMADDSUB213PD, self::VFMADDSUB213PD)
            ->bind(OperationType::VFMADDSUB213PH, self::VFMADDSUB213PH)
            ->bind(OperationType::VFMADDSUB213PS, self::VFMADDSUB213PS)
            ->bind(OperationType::VFMADDSUB231PD, self::VFMADDSUB231PD)
            ->bind(OperationType::VFMADDSUB231PH, self::VFMADDSUB231PH)
            ->bind(OperationType::VFMADDSUB231PS, self::VFMADDSUB231PS)
            ->bind(OperationType::VFMSUB132PD, self::VFMSUB132PD)
            ->bind(OperationType::VFMSUB132PH, self::VFMSUB132PH)
            ->bind(OperationType::VFMSUB132PS, self::VFMSUB132PS)
            ->bind(OperationType::VFMSUB132SD, self::VFMSUB132SD)
            ->bind(OperationType::VFMSUB132SH, self::VFMSUB132SH)
            ->bind(OperationType::VFMSUB132SS, self::VFMSUB132SS)
            ->bind(OperationType::VFMSUB213PD, self::VFMSUB213PD)
            ->bind(OperationType::VFMSUB213PH, self::VFMSUB213PH)
            ->bind(OperationType::VFMSUB213PS, self::VFMSUB213PS)
            ->bind(OperationType::VFMSUB213SD, self::VFMSUB213SD)
            ->bind(OperationType::VFMSUB213SH, self::VFMSUB213SH)
            ->bind(OperationType::VFMSUB213SS, self::VFMSUB213SS)
            ->bind(OperationType::VFMSUB231PD, self::VFMSUB231PD)
            ->bind(OperationType::VFMSUB231PH, self::VFMSUB231PH)
            ->bind(OperationType::VFMSUB231PS, self::VFMSUB231PS)
            ->bind(OperationType::VFMSUB231SD, self::VFMSUB231SD)
            ->bind(OperationType::VFMSUB231SH, self::VFMSUB231SH)
            ->bind(OperationType::VFMSUB231SS, self::VFMSUB231SS)
            ->bind(OperationType::VFMSUBADD132PD, self::VFMSUBADD132PD)
            ->bind(OperationType::VFMSUBADD132PH, self::VFMSUBADD132PH)
            ->bind(OperationType::VFMSUBADD132PS, self::VFMSUBADD132PS)
            ->bind(OperationType::VFMSUBADD213PD, self::VFMSUBADD213PD)
            ->bind(OperationType::VFMSUBADD213PH, self::VFMSUBADD213PH)
            ->bind(OperationType::VFMSUBADD213PS, self::VFMSUBADD213PS)
            ->bind(OperationType::VFMSUBADD231PD, self::VFMSUBADD231PD)
            ->bind(OperationType::VFMSUBADD231PH, self::VFMSUBADD231PH)
            ->bind(OperationType::VFMSUBADD231PS, self::VFMSUBADD231PS)
            ->bind(OperationType::VFMULCPH, self::VFMULCPH)
            ->bind(OperationType::VFMULCSH, self::VFMULCSH)
            ->bind(OperationType::VFNMADD132PD, self::VFNMADD132PD)
            ->bind(OperationType::VFNMADD132PH, self::VFNMADD132PH)
            ->bind(OperationType::VFNMADD132PS, self::VFNMADD132PS)
            ->bind(OperationType::VFNMADD132SD, self::VFNMADD132SD)
            ->bind(OperationType::VFNMADD132SH, self::VFNMADD132SH)
            ->bind(OperationType::VFNMADD132SS, self::VFNMADD132SS)
            ->bind(OperationType::VFNMADD213PD, self::VFNMADD213PD)
            ->bind(OperationType::VFNMADD213PH, self::VFNMADD213PH)
            ->bind(OperationType::VFNMADD213PS, self::VFNMADD213PS)
            ->bind(OperationType::VFNMADD213SD, self::VFNMADD213SD)
            ->bind(OperationType::VFNMADD213SH, self::VFNMADD213SH)
            ->bind(OperationType::VFNMADD213SS, self::VFNMADD213SS)
            ->bind(OperationType::VFNMADD231PD, self::VFNMADD231PD)
            ->bind(OperationType::VFNMADD231PH, self::VFNMADD231PH)
            ->bind(OperationType::VFNMADD231PS, self::VFNMADD231PS)
            ->bind(OperationType::VFNMADD231SD, self::VFNMADD231SD)
            ->bind(OperationType::VFNMADD231SH, self::VFNMADD231SH)
            ->bind(OperationType::VFNMADD231SS, self::VFNMADD231SS)
            ->bind(OperationType::VFNMSUB132PD, self::VFNMSUB132PD)
            ->bind(OperationType::VFNMSUB132PH, self::VFNMSUB132PH)
            ->bind(OperationType::VFNMSUB132PS, self::VFNMSUB132PS)
            ->bind(OperationType::VFNMSUB132SD, self::VFNMSUB132SD)
            ->bind(OperationType::VFNMSUB132SH, self::VFNMSUB132SH)
            ->bind(OperationType::VFNMSUB132SS, self::VFNMSUB132SS)
            ->bind(OperationType::VFNMSUB213PD, self::VFNMSUB213PD)
            ->bind(OperationType::VFNMSUB213PH, self::VFNMSUB213PH)
            ->bind(OperationType::VFNMSUB213PS, self::VFNMSUB213PS)
            ->bind(OperationType::VFNMSUB213SD, self::VFNMSUB213SD)
            ->bind(OperationType::VFNMSUB213SH, self::VFNMSUB213SH)
            ->bind(OperationType::VFNMSUB213SS, self::VFNMSUB213SS)
            ->bind(OperationType::VFNMSUB231PD, self::VFNMSUB231PD)
            ->bind(OperationType::VFNMSUB231PH, self::VFNMSUB231PH)
            ->bind(OperationType::VFNMSUB231PS, self::VFNMSUB231PS)
            ->bind(OperationType::VFNMSUB231SD, self::VFNMSUB231SD)
            ->bind(OperationType::VFNMSUB231SH, self::VFNMSUB231SH)
            ->bind(OperationType::VFNMSUB231SS, self::VFNMSUB231SS)
            ->bind(OperationType::VFPCLASSPD, self::VFPCLASSPD)
            ->bind(OperationType::VFPCLASSPH, self::VFPCLASSPH)
            ->bind(OperationType::VFPCLASSPS, self::VFPCLASSPS)
            ->bind(OperationType::VFPCLASSSD, self::VFPCLASSSD)
            ->bind(OperationType::VFPCLASSSH, self::VFPCLASSSH)
            ->bind(OperationType::VFPCLASSSS, self::VFPCLASSSS)
            ->bind(OperationType::VGATHERDPD, self::VGATHERDPD)
            ->bind(OperationType::VGATHERDPS, self::VGATHERDPS)
            ->bind(OperationType::VGATHERQPD, self::VGATHERQPD)
            ->bind(OperationType::VGATHERQPS, self::VGATHERQPS)
            ->bind(OperationType::VGETEXPPD, self::VGETEXPPD)
            ->bind(OperationType::VGETEXPPH, self::VGETEXPPH)
            ->bind(OperationType::VGETEXPPS, self::VGETEXPPS)
            ->bind(OperationType::VGETEXPSD, self::VGETEXPSD)
            ->bind(OperationType::VGETEXPSH, self::VGETEXPSH)
            ->bind(OperationType::VGETEXPSS, self::VGETEXPSS)
            ->bind(OperationType::VGETMANTPD, self::VGETMANTPD)
            ->bind(OperationType::VGETMANTPH, self::VGETMANTPH)
            ->bind(OperationType::VGETMANTPS, self::VGETMANTPS)
            ->bind(OperationType::VGETMANTSD, self::VGETMANTSD)
            ->bind(OperationType::VGETMANTSH, self::VGETMANTSH)
            ->bind(OperationType::VGETMANTSS, self::VGETMANTSS)
            ->bind(OperationType::VINSERTF128, self::VINSERTF128)
            ->bind(OperationType::VINSERTF32X4, self::VINSERTF32X4)
            ->bind(OperationType::VINSERTF32X8, self::VINSERTF32X8)
            ->bind(OperationType::VINSERTF64X2, self::VINSERTF64X2)
            ->bind(OperationType::VINSERTF64X4, self::VINSERTF64X4)
            ->bind(OperationType::VINSERTI128, self::VINSERTI128)
            ->bind(OperationType::VINSERTI32X4, self::VINSERTI32X4)
            ->bind(OperationType::VINSERTI32X8, self::VINSERTI32X8)
            ->bind(OperationType::VINSERTI64X2, self::VINSERTI64X2)
            ->bind(OperationType::VINSERTI64X4, self::VINSERTI64X4)
            ->bind(OperationType::VMASKMOV, self::VMASKMOV)
            ->bind(OperationType::VMAXPH, self::VMAXPH)
            ->bind(OperationType::VMAXSH, self::VMAXSH)
            ->bind(OperationType::VMINPH, self::VMINPH)
            ->bind(OperationType::VMINSH, self::VMINSH)
            ->bind(OperationType::VMOVDQA32, self::VMOVDQA32)
            ->bind(OperationType::VMOVDQA64, self::VMOVDQA64)
            ->bind(OperationType::VMOVDQU16, self::VMOVDQU16)
            ->bind(OperationType::VMOVDQU32, self::VMOVDQU32)
            ->bind(OperationType::VMOVDQU64, self::VMOVDQU64)
            ->bind(OperationType::VMOVDQU8, self::VMOVDQU8)
            ->bind(OperationType::VMOVSH, self::VMOVSH)
            ->bind(OperationType::VMOVW, self::VMOVW)
            ->bind(OperationType::VMULPH, self::VMULPH)
            ->bind(OperationType::VMULSH, self::VMULSH)
            ->bind(OperationType::VP2INTERSECTD, self::VP2INTERSECTD)
            ->bind(OperationType::VP2INTERSECTQ, self::VP2INTERSECTQ)
            ->bind(OperationType::VPBLENDD, self::VPBLENDD)
            ->bind(OperationType::VPBLENDMB, self::VPBLENDMB)
            ->bind(OperationType::VPBLENDMD, self::VPBLENDMD)
            ->bind(OperationType::VPBLENDMQ, self::VPBLENDMQ)
            ->bind(OperationType::VPBLENDMW, self::VPBLENDMW)
            ->bind(OperationType::VPBROADCAST, self::VPBROADCAST)
            ->bind(OperationType::VPBROADCASTB, self::VPBROADCASTB)
            ->bind(OperationType::VPBROADCASTD, self::VPBROADCASTD)
            ->bind(OperationType::VPBROADCASTM, self::VPBROADCASTM)
            ->bind(OperationType::VPBROADCASTQ, self::VPBROADCASTQ)
            ->bind(OperationType::VPBROADCASTW, self::VPBROADCASTW)
            ->bind(OperationType::VPCMPB, self::VPCMPB)
            ->bind(OperationType::VPCMPD, self::VPCMPD)
            ->bind(OperationType::VPCMPQ, self::VPCMPQ)
            ->bind(OperationType::VPCMPUB, self::VPCMPUB)
            ->bind(OperationType::VPCMPUD, self::VPCMPUD)
            ->bind(OperationType::VPCMPUQ, self::VPCMPUQ)
            ->bind(OperationType::VPCMPUW, self::VPCMPUW)
            ->bind(OperationType::VPCMPW, self::VPCMPW)
            ->bind(OperationType::VPCOMPRESSB, self::VPCOMPRESSB)
            ->bind(OperationType::VPCOMPRESSD, self::VPCOMPRESSD)
            ->bind(OperationType::VPCOMPRESSQ, self::VPCOMPRESSQ)
            ->bind(OperationType::VPCONFLICTD, self::VPCONFLICTD)
            ->bind(OperationType::VPCONFLICTQ, self::VPCONFLICTQ)
            ->bind(OperationType::VPDPBUSD, self::VPDPBUSD)
            ->bind(OperationType::VPDPBUSDS, self::VPDPBUSDS)
            ->bind(OperationType::VPDPWSSD, self::VPDPWSSD)
            ->bind(OperationType::VPDPWSSDS, self::VPDPWSSDS)
            ->bind(OperationType::VPERM2F128, self::VPERM2F128)
            ->bind(OperationType::VPERM2I128, self::VPERM2I128)
            ->bind(OperationType::VPERMB, self::VPERMB)
            ->bind(OperationType::VPERMD, self::VPERMD)
            ->bind(OperationType::VPERMI2B, self::VPERMI2B)
            ->bind(OperationType::VPERMI2D, self::VPERMI2D)
            ->bind(OperationType::VPERMI2PD, self::VPERMI2PD)
            ->bind(OperationType::VPERMI2PS, self::VPERMI2PS)
            ->bind(OperationType::VPERMI2Q, self::VPERMI2Q)
            ->bind(OperationType::VPERMI2W, self::VPERMI2W)
            ->bind(OperationType::VPERMILPD, self::VPERMILPD)
            ->bind(OperationType::VPERMILPS, self::VPERMILPS)
            ->bind(OperationType::VPERMPD, self::VPERMPD)
            ->bind(OperationType::VPERMPS, self::VPERMPS)
            ->bind(OperationType::VPERMQ, self::VPERMQ)
            ->bind(OperationType::VPERMT2B, self::VPERMT2B)
            ->bind(OperationType::VPERMT2D, self::VPERMT2D)
            ->bind(OperationType::VPERMT2PD, self::VPERMT2PD)
            ->bind(OperationType::VPERMT2PS, self::VPERMT2PS)
            ->bind(OperationType::VPERMT2Q, self::VPERMT2Q)
            ->bind(OperationType::VPERMT2W, self::VPERMT2W)
            ->bind(OperationType::VPERMW, self::VPERMW)
            ->bind(OperationType::VPEXPANDB, self::VPEXPANDB)
            ->bind(OperationType::VPEXPANDD, self::VPEXPANDD)
            ->bind(OperationType::VPEXPANDQ, self::VPEXPANDQ)
            ->bind(OperationType::VPEXPANDW, self::VPEXPANDW)
            ->bind(OperationType::VPGATHERDD, self::VPGATHERDD)
            ->bind(OperationType::VPGATHERDQ, self::VPGATHERDQ)
            ->bind(OperationType::VPGATHERQD, self::VPGATHERQD)
            ->bind(OperationType::VPGATHERQQ, self::VPGATHERQQ)
            ->bind(OperationType::VPLZCNTD, self::VPLZCNTD)
            ->bind(OperationType::VPLZCNTQ, self::VPLZCNTQ)
            ->bind(OperationType::VPMADD52HUQ, self::VPMADD52HUQ)
            ->bind(OperationType::VPMADD52LUQ, self::VPMADD52LUQ)
            ->bind(OperationType::VPMASKMOV, self::VPMASKMOV)
            ->bind(OperationType::VPMOVB2M, self::VPMOVB2M)
            ->bind(OperationType::VPMOVD2M, self::VPMOVD2M)
            ->bind(OperationType::VPMOVDB, self::VPMOVDB)
            ->bind(OperationType::VPMOVDW, self::VPMOVDW)
            ->bind(OperationType::VPMOVM2B, self::VPMOVM2B)
            ->bind(OperationType::VPMOVM2D, self::VPMOVM2D)
            ->bind(OperationType::VPMOVM2Q, self::VPMOVM2Q)
            ->bind(OperationType::VPMOVM2W, self::VPMOVM2W)
            ->bind(OperationType::VPMOVQ2M, self::VPMOVQ2M)
            ->bind(OperationType::VPMOVQB, self::VPMOVQB)
            ->bind(OperationType::VPMOVQD, self::VPMOVQD)
            ->bind(OperationType::VPMOVQW, self::VPMOVQW)
            ->bind(OperationType::VPMOVSDB, self::VPMOVSDB)
            ->bind(OperationType::VPMOVSDW, self::VPMOVSDW)
            ->bind(OperationType::VPMOVSQB, self::VPMOVSQB)
            ->bind(OperationType::VPMOVSQD, self::VPMOVSQD)
            ->bind(OperationType::VPMOVSQW, self::VPMOVSQW)
            ->bind(OperationType::VPMOVSWB, self::VPMOVSWB)
            ->bind(OperationType::VPMOVUSDB, self::VPMOVUSDB)
            ->bind(OperationType::VPMOVUSDW, self::VPMOVUSDW)
            ->bind(OperationType::VPMOVUSQB, self::VPMOVUSQB)
            ->bind(OperationType::VPMOVUSQD, self::VPMOVUSQD)
            ->bind(OperationType::VPMOVUSQW, self::VPMOVUSQW)
            ->bind(OperationType::VPMOVUSWB, self::VPMOVUSWB)
            ->bind(OperationType::VPMOVW2M, self::VPMOVW2M)
            ->bind(OperationType::VPMOVWB, self::VPMOVWB)
            ->bind(OperationType::VPMULTISHIFTQB, self::VPMULTISHIFTQB)
            ->bind(OperationType::VPOPCNT, self::VPOPCNT)
            ->bind(OperationType::VPROLD, self::VPROLD)
            ->bind(OperationType::VPROLQ, self::VPROLQ)
            ->bind(OperationType::VPROLVD, self::VPROLVD)
            ->bind(OperationType::VPROLVQ, self::VPROLVQ)
            ->bind(OperationType::VPRORD, self::VPRORD)
            ->bind(OperationType::VPRORQ, self::VPRORQ)
            ->bind(OperationType::VPRORVD, self::VPRORVD)
            ->bind(OperationType::VPRORVQ, self::VPRORVQ)
            ->bind(OperationType::VPSCATTERDD, self::VPSCATTERDD)
            ->bind(OperationType::VPSCATTERDQ, self::VPSCATTERDQ)
            ->bind(OperationType::VPSCATTERQD, self::VPSCATTERQD)
            ->bind(OperationType::VPSCATTERQQ, self::VPSCATTERQQ)
            ->bind(OperationType::VPSHLD, self::VPSHLD)
            ->bind(OperationType::VPSHLDV, self::VPSHLDV)
            ->bind(OperationType::VPSHRD, self::VPSHRD)
            ->bind(OperationType::VPSHRDV, self::VPSHRDV)
            ->bind(OperationType::VPSHUFBITQMB, self::VPSHUFBITQMB)
            ->bind(OperationType::VPSLLVD, self::VPSLLVD)
            ->bind(OperationType::VPSLLVQ, self::VPSLLVQ)
            ->bind(OperationType::VPSLLVW, self::VPSLLVW)
            ->bind(OperationType::VPSRAVD, self::VPSRAVD)
            ->bind(OperationType::VPSRAVQ, self::VPSRAVQ)
            ->bind(OperationType::VPSRAVW, self::VPSRAVW)
            ->bind(OperationType::VPSRLVD, self::VPSRLVD)
            ->bind(OperationType::VPSRLVQ, self::VPSRLVQ)
            ->bind(OperationType::VPSRLVW, self::VPSRLVW)
            ->bind(OperationType::VPTERNLOGD, self::VPTERNLOGD)
            ->bind(OperationType::VPTERNLOGQ, self::VPTERNLOGQ)
            ->bind(OperationType::VPTESTMB, self::VPTESTMB)
            ->bind(OperationType::VPTESTMD, self::VPTESTMD)
            ->bind(OperationType::VPTESTMQ, self::VPTESTMQ)
            ->bind(OperationType::VPTESTMW, self::VPTESTMW)
            ->bind(OperationType::VPTESTNMB, self::VPTESTNMB)
            ->bind(OperationType::VPTESTNMD, self::VPTESTNMD)
            ->bind(OperationType::VPTESTNMQ, self::VPTESTNMQ)
            ->bind(OperationType::VPTESTNMW, self::VPTESTNMW)
            ->bind(OperationType::VRANGEPD, self::VRANGEPD)
            ->bind(OperationType::VRANGEPS, self::VRANGEPS)
            ->bind(OperationType::VRANGESD, self::VRANGESD)
            ->bind(OperationType::VRANGESS, self::VRANGESS)
            ->bind(OperationType::VRCP14PD, self::VRCP14PD)
            ->bind(OperationType::VRCP14PS, self::VRCP14PS)
            ->bind(OperationType::VRCP14SD, self::VRCP14SD)
            ->bind(OperationType::VRCP14SS, self::VRCP14SS)
            ->bind(OperationType::VRCPPH, self::VRCPPH)
            ->bind(OperationType::VRCPSH, self::VRCPSH)
            ->bind(OperationType::VREDUCEPD, self::VREDUCEPD)
            ->bind(OperationType::VREDUCEPH, self::VREDUCEPH)
            ->bind(OperationType::VREDUCEPS, self::VREDUCEPS)
            ->bind(OperationType::VREDUCESD, self::VREDUCESD)
            ->bind(OperationType::VREDUCESH, self::VREDUCESH)
            ->bind(OperationType::VREDUCESS, self::VREDUCESS)
            ->bind(OperationType::VRNDSCALEPD, self::VRNDSCALEPD)
            ->bind(OperationType::VRNDSCALEPH, self::VRNDSCALEPH)
            ->bind(OperationType::VRNDSCALEPS, self::VRNDSCALEPS)
            ->bind(OperationType::VRNDSCALESD, self::VRNDSCALESD)
            ->bind(OperationType::VRNDSCALESH, self::VRNDSCALESH)
            ->bind(OperationType::VRNDSCALESS, self::VRNDSCALESS)
            ->bind(OperationType::VRSQRT14PD, self::VRSQRT14PD)
            ->bind(OperationType::VRSQRT14PS, self::VRSQRT14PS)
            ->bind(OperationType::VRSQRT14SD, self::VRSQRT14SD)
            ->bind(OperationType::VRSQRT14SS, self::VRSQRT14SS)
            ->bind(OperationType::VRSQRTPH, self::VRSQRTPH)
            ->bind(OperationType::VRSQRTSH, self::VRSQRTSH)
            ->bind(OperationType::VSCALEFPD, self::VSCALEFPD)
            ->bind(OperationType::VSCALEFPH, self::VSCALEFPH)
            ->bind(OperationType::VSCALEFPS, self::VSCALEFPS)
            ->bind(OperationType::VSCALEFSD, self::VSCALEFSD)
            ->bind(OperationType::VSCALEFSH, self::VSCALEFSH)
            ->bind(OperationType::VSCALEFSS, self::VSCALEFSS)
            ->bind(OperationType::VSCATTERDPD, self::VSCATTERDPD)
            ->bind(OperationType::VSCATTERDPS, self::VSCATTERDPS)
            ->bind(OperationType::VSCATTERQPD, self::VSCATTERQPD)
            ->bind(OperationType::VSCATTERQPS, self::VSCATTERQPS)
            ->bind(OperationType::VSHUFF32X4, self::VSHUFF32X4)
            ->bind(OperationType::VSHUFF64X2, self::VSHUFF64X2)
            ->bind(OperationType::VSHUFI32X4, self::VSHUFI32X4)
            ->bind(OperationType::VSHUFI64X2, self::VSHUFI64X2)
            ->bind(OperationType::VSQRTPH, self::VSQRTPH)
            ->bind(OperationType::VSQRTSH, self::VSQRTSH)
            ->bind(OperationType::VSUBPH, self::VSUBPH)
            ->bind(OperationType::VSUBSH, self::VSUBSH)
            ->bind(OperationType::VTESTPD, self::VTESTPD)
            ->bind(OperationType::VTESTPS, self::VTESTPS)
            ->bind(OperationType::VUCOMISH, self::VUCOMISH)
            ->bind(OperationType::VZEROALL, self::VZEROALL)
            ->bind(OperationType::VZEROUPPER, self::VZEROUPPER)
            ->bind(OperationType::WAIT, self::WAIT)
            ->bind(OperationType::WBINVD, self::WBINVD)
            ->bind(OperationType::WBNOINVD, self::WBNOINVD)
            ->bind(OperationType::WRFSBASE, self::WRFSBASE)
            ->bind(OperationType::WRGSBASE, self::WRGSBASE)
            ->bind(OperationType::WRMSR, self::WRMSR)
            ->bind(OperationType::WRPKRU, self::WRPKRU)
            ->bind(OperationType::WRSSD, self::WRSSD)
            ->bind(OperationType::WRSSQ, self::WRSSQ)
            ->bind(OperationType::WRUSSD, self::WRUSSD)
            ->bind(OperationType::WRUSSQ, self::WRUSSQ)
            ->bind(OperationType::XABORT, self::XABORT)
            ->bind(OperationType::XACQUIRE, self::XACQUIRE)
            ->bind(OperationType::XADD, self::XADD)
            ->bind(OperationType::XBEGIN, self::XBEGIN)
            ->bind(OperationType::XCHG, self::XCHG)
            ->bind(OperationType::XEND, self::XEND)
            ->bind(OperationType::XGETBV, self::XGETBV)
            ->bind(OperationType::XLAT, self::XLAT)
            ->bind(OperationType::XLATB, self::XLATB)
            ->bind(OperationType::XOR_, self::XOR_)
            ->bind(OperationType::XORPD, self::XORPD)
            ->bind(OperationType::XORPS, self::XORPS)
            ->bind(OperationType::XRELEASE, self::XRELEASE)
            ->bind(OperationType::XRESLDTRK, self::XRESLDTRK)
            ->bind(OperationType::XRSTOR, self::XRSTOR)
            ->bind(OperationType::XRSTORS, self::XRSTORS)
            ->bind(OperationType::XSAVE, self::XSAVE)
            ->bind(OperationType::XSAVEC, self::XSAVEC)
            ->bind(OperationType::XSAVEOPT, self::XSAVEOPT)
            ->bind(OperationType::XSAVES, self::XSAVES)
            ->bind(OperationType::XSETBV, self::XSETBV)
            ->bind(OperationType::XSUSLDTRK, self::XSUSLDTRK)
            ->bind(OperationType::XTEST, self::XTEST);
    }
}
